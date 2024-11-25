<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\HaghighiHoghooghi;
use App\Models\InsCodes;
use Carbon\Carbon;
use DOMDocument;
use DOMXPath;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;

class FundController extends Controller
{
    public function index(){
        $funds = Fund::all();
        foreach ($funds as $key => $value) {
            $inscode = InsCodes::where("LVal18AFC", $value->symbol)->first();
            if($inscode){
                Log::info([$key, $inscode->insCode]);
                Fund::where("symbol", $value->symbol)->update([
                    "ins_code" => $inscode->insCode
                ]);
                // $value->save();
            }
        }
    }


    public function db(){
        $data = file_get_contents("data4.json");
        $data = json_decode($data)->TseInstruments;
        foreach ($data as $key => $value) {
            InsCodes::insert([
                "insCode" => $value->InsCode,
                "LVal18AFC" => $value->LVal18AFC,
                "LSoc30" => $value->LSoc30,
                "LVal30" => $value->LVal30,
                "YVal" => $value->YVal,
                "Flow" => $value->Flow,
                "Valid" => $value->Valid
            ]);
        }
        return response()->json($data);
    }

    public function a(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://service.tsetmc.com/WebService/TsePublicV2.asmx',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',

        CURLOPT_POSTFIELDS => '<?xml version="1.0" encoding="utf-8"?>
        <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
          <soap12:Body>
            <Instrument xmlns="http://tsetmc.com/">
              <UserName>tavana.net</UserName>
              <Password>Tavan@159302</Password>
              <Flow>2</Flow>
            </Instrument>
          </soap12:Body>
        </soap12:Envelope>',



        CURLOPT_HTTPHEADER => array(
            'Content-Type: text/xml;'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
    }


    public function main(){
        ini_set('max_execution_time', '30000');
        foreach(Fund::all() as $fund){
            $request = Http::get('https://cdn.tsetmc.com/api/ClientType/GetClientTypeHistory/' . $fund->ins_code);
            $data = json_decode($request->body());
            foreach($data->clientType as $item){
                Log::info([$item->recDate, $item->insCode]);
                $founded_fund = HaghighiHoghooghi::where('rec_date', $item->recDate)->where("ins_code", $item->insCode)->first();
                if(!$founded_fund){
                    HaghighiHoghooghi::create([
                        "rec_date" => $item->recDate,
                        "ins_code" => $item->insCode,
                        "buy_i_volume" => $item->buy_I_Volume,
                        "buy_n_volume" => $item->buy_N_Volume,
                        "buy_i_value" => $item->buy_I_Value,
                        "buy_n_value" => $item->buy_N_Value,
                        "buy_n_count" => $item->buy_N_Count,
                        "sell_i_volume" => $item->sell_I_Volume,
                        "buy_i_count" => $item->buy_I_Count,
                        "sell_n_volume" => $item->sell_N_Volume,
                        "sell_i_value" => $item->sell_I_Value,
                        "sell_n_value" => $item->sell_N_Value,
                        "sell_n_count" => $item->sell_N_Count,
                        "sell_i_count" => $item->sell_I_Count,
                    ]);
                }
            }
        }
    }

    public function setNames(){
        ini_set('max_execution_time', '30000');
        foreach(Fund::all() as $fund){
            $request = Http::get('https://cdn.tsetmc.com/api/ClientType/GetClientTypeHistory/' . $fund->ins_code);
            $data = json_decode($request->body());
            foreach($data->clientType as $item){
                Log::info([$item->recDate, $item->insCode]);
                $founded_fund = HaghighiHoghooghi::where('rec_date', $item->recDate)->where("ins_code", $item->insCode)->first();
                if(!$founded_fund){
                    HaghighiHoghooghi::create([
                        "rec_date" => $item->recDate,
                        "ins_code" => $item->insCode,
                        "buy_i_volume" => $item->buy_I_Volume,
                        "buy_n_volume" => $item->buy_N_Volume,
                        "buy_i_value" => $item->buy_I_Value,
                        "buy_n_value" => $item->buy_N_Value,
                        "buy_n_count" => $item->buy_N_Count,
                        "sell_i_volume" => $item->sell_I_Volume,
                        "buy_i_count" => $item->buy_I_Count,
                        "sell_n_volume" => $item->sell_N_Volume,
                        "sell_i_value" => $item->sell_I_Value,
                        "sell_n_value" => $item->sell_N_Value,
                        "sell_n_count" => $item->sell_N_Count,
                        "sell_i_count" => $item->sell_I_Count,
                    ]);
                }
            }
        }
    }

    public function test(){
        $data = DB::table("shakhes_kol")
            ->select("date", "x_niv_inu_cl_mres_ibs")
            // ->where("date", ">", "2021-03-19")
            ->orderBy("date")
            ->get()
            ->map(function ($query){
                return [
                    strtotime($query->date) * 1000,
                    intval($query->x_niv_inu_cl_mres_ibs)
                ];
            });

        return response()->json($data);




        $spare = 0;
        $data = DB::table("haghighi_hoghooghis")->join("funds_data", "funds_data.ins_code", "=", "haghighi_hoghooghis.ins_code")
            ->orderBy("rec_date")
            ->where("rec_date", ">", "2021-03-19")
            ->get()
            ->groupBy('fund_type')
            ->map(function($group){
                return $group->groupBy("rec_date")
                    ->map(function($secondGroup, $date) use (&$spare){
                        $value = $secondGroup->sum("sell_n_value") - $secondGroup->sum("buy_n_value");
                        $spare += $value;
                        // return [
                        //     "situation" => $value < 0 ? "khorooj haghighi" : "vorood haghighi",
                        //     "sum froosh" => $secondGroup->sum("sell_n_value"),
                        //     "buy froosh" => $secondGroup->sum("buy_n_value"),
                        //     "value" => $value
                        // ];

                        return [strtotime(Carbon::parse($date)->toDateTimeString()) * 1000, $spare];
                    });
            })
            ->toArray();

        // $json_data = json_encode($data["در سهام"]);
        return response()->json(array_values($data["در اوراق بهادار مبتنی بر سپرده کالایی"]));
        // return response()->json(array_values($data["در سهام"]));
        // return response()->json(array_values($data["در اوراق بهادار با درآمد ثابت"]));
    }

    public function chart(){
            return view("chart");
    }


    public function setShakhesKolToDb(){
        $request = Http::get('https://cdn.tsetmc.com/api/Index/GetIndexB2History/32097828799138957');
        $data = json_decode($request->body())->indexB2;

        foreach($data as $amount){
            DB::table("shakhes_kol")->insertOrIgnore([
                "ins_code" => $amount->insCode,
                "date" => $amount->dEven,
                "x_niv_inu_cl_mres_ibs" => $amount->xNivInuClMresIbs,
                "x_niv_inu_pb_mres_ibs" => $amount->xNivInuPbMresIbs,
                "x_niv_inu_ph_mres_ibs" => $amount->xNivInuPhMresIbs
            ]);
        }
        return $data;
    }
}
