<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;

class CustomerCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:customer-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // part1
        $start = 'pro';
        $end = 'zzz';

        // part2
        // $start = 'pro';
        // $end = 'zzz';
        //

        $resolved_strings = self::resolve_range($start, $end);

        foreach ($resolved_strings as $key => $value) {
            $data = self::getData($value);

            foreach ($data->dataList as $key => $data) {
                $this->create($data);
                $this->info($data->name . "-" . $value);
            }
        }
    }

    public function getData($value)
    {
        $userfile = file_get_contents("./app/Console/Commands/datascript/" . $value . ".txt");

        // Place each line of $userfile into array
        $users = explode("JSON.parse", $userfile);

        $data = json_encode($users[1], true);
        $map = json_decode($data);

        $start = strpos($map, '(') + 1;
        $end = strpos($map, ');', $start);
        $datas = substr($map, $start, $end - $start);
        // $datas = json_decode($map, true);
        $data1 = json_decode($datas);
        $data2 = json_decode($data1);
        return $data2;
    }

    public function create($data)
    {

        Customer::updateOrCreate(["email" => $data->email], [
            "amountBeforeTax" => $data->amountBeforeTax,
            "billedEntityType" => $data->billedEntityType,
            "billedTo" => $data->billedTo,
            "expiryDate" => $data->expiryDate,
            "number" => $data->number,
            "nik" => $data->nik,
            "agentUid" => $data->agentUid,
            "storeName" => $data->storeName,
            "npwp" => $data->npwp,
            "agentName" => $data->agentName,
            "grossAmount" => $data->grossAmount,
            "storeId" => $data->storeId,
            "billedAddress" => $data->billedAddress,
            "billedZipCode" => $data->billedZipCode,
            "billedProvince" => $data->billedProvince,
            "createTime" => $data->createTime,
            "phone" => $data->phone,
            "isHasExtendedExpiryDate" => $data->isHasExtendedExpiryDate,
            "name" => $data->name,
            "detailList" => json_encode($data->detailList),
            "shippingAddress" => $data->shippingAddress,
            "taxAmount" => $data->taxAmount,
            "status" => $data->status,
            "storeCode" => $data->storeCode,
        ]);
    }

    public function generate_text($length)
    {
        $small = range('a', 'z');
        if ($length <= 0) {
            return [];
        } elseif ($length == 1) {
            return $small;
        } else {
            $result = [];
            foreach ($small as $letter) {
                foreach (self::generate_text($length - 1) as $subLetter) {
                    $result[] = $letter . $subLetter;
                }
            }
            return $result;
        }
    }

    public function resolve_range($start, $end)
    {
        $result = [];
        for ($length = strlen($start); $length <= strlen($end); $length++) {
            $result = array_merge($result, self::generate_text($length));
        }

        return array_filter($result, function ($string) use ($start, $end) {
            return $string >= $start && $string <= $end;
        });
    }
}
