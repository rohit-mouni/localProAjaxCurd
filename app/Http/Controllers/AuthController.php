<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\NotifyUsers;
use App\Models\DummyUser;
use Illuminate\Support\Facades\DB;
use DataTables;


class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('home');
    }
    public function SendNotification(Request $request)
    {
        // ---firebase code..---
        $firebaseToken = DummyUser::whereNotNull('device_token')->pluck('device_token')->take(10)->all();
        $SERVER_API_KEY = env('SERVER_API_KEY');

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => 'test firebase',
                "body" => 'test firebase notification..',
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
        dd($response);

        return redirect()->route('home');
    }

    public function userList(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('dummy_users')->limit(25)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('edit.user.list');
                    $btn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('users.users');
    }

    public function editUserList(Request $request)
    {
        $currentPage = $request->input('page', 1);

        // return redirect()->route('user.list');
        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully.',
            'page' => $currentPage
        ]);
    }
    public function addProduct(Request $request)
    {
        return view('product.add');
    }
}
