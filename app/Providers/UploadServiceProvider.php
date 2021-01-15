<?php

namespace App\Providers;

use App\Models\Person;
use App\Models\Phone;
use App\Models\ShipOrder;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Exception;
use SimpleXMLElement;

/**
 * Class UploadServiceProvider
 * @package App\Providers
 */
class UploadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * @param string $path
     * @param string $token
     * @return string
     */
    public static function processUploadedFile(string $path, string $token)
    {
        $xml = Storage::get($path);

        try {
            $content = simplexml_load_string($xml);
        } catch (\Exception $e) {
            $result = 'Arquivo inválido';

            LogServiceProvider::logError(
                $result,
                $token
            );

            return $result;
        }

        $result = 'Arquivo processado';
        $status = Status::STATUS_PROCESSED;

        try {
            foreach ($content as $element) {
                if ($content->person) {
                    UploadServiceProvider::processPersonXml($element, $token);

                    continue;
                }

                if ($content->shiporder) {
                    UploadServiceProvider::processShipOrderXml($element, $token);
                }
            }
        } catch (Exception $e) {
            $result = 'Erro ao processar arquivo';
            $status = Status::STATUS_REJECTED;
        }

        LogServiceProvider::log(
            $result,
            $token,
            $status
        );

        return $result;
    }

    /**
     * @param SimpleXMLElement $element
     * @param string $token
     */
    private static function processPersonXml(SimpleXMLElement $element, string $token): void
    {
        DB::beginTransaction();

        $person = new Person();

        $person->id = $element->personid->__toString();
        $person->name = $element->personname->__toString();

        $person->save();

        if ($element->phones) {
            foreach ($element->phones->phone as $personPhone) {
                $person->phones()->create(['number' => $personPhone->__toString()]);
            }
        }

        DB::commit();

        LogServiceProvider::log(
            "Cliente cadastrado: {$person->name} com o ID: {$person->id}",
            $token,
            Status::STATUS_PROCESSING
        );
    }

    /**
     * @param SimpleXMLElement $element
     * @param string $token
     */
    private static function processShipOrderXml(SimpleXMLElement $element, string $token)
    {
        DB::beginTransaction();
        $shipOrder = new ShipOrder();

        $shipOrder->id = $element->orderid->__toString();
        $shipOrder->person = $element->orderperson->__toString();

        $shipOrder->save();

        if ($element->shipto) {
            $shipOrder->shipTo()->create([
                'name' => $element->shipto->name->__toString(),
                'address' => $element->shipto->address->__toString(),
                'city' => $element->shipto->city->__toString(),
                'country' => $element->shipto->country->__toString()
            ]);
        }

        if ($element->items) {
            foreach ($element->items->item as $orderItem) {
                $shipOrder->items()->create([
                    'title' => $orderItem->title->__toString(),
                    'note' => $orderItem->note->__toString(),
                    'quantity' => $orderItem->quantity->__toString(),
                    'price' => $orderItem->price->__toString()
                ]);
            }
        }

        DB::commit();

        $person = Person::find($shipOrder->person);

        LogServiceProvider::log(
            "Ordem de envio cadastrada: {$shipOrder->id} para o cliente: {$person->name}",
            $token,
            Status::STATUS_PROCESSING
        );
    }
}
