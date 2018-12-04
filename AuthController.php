<?php

namespace App\Http\Controllers;

use App\User;
use App\admAccounts;
use App\secCompanies;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

     public function signup(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:secUsers',
            'password' => 'required|string|min:8|confirmed',
            'cellPhone'=> 'required|string',
            'companyName'=> 'required|string',
            //'idActivity'=> 'required|string',            
        ]);
        $admAccounts = new admAccounts([
            'description'     => $request->companyName,
            'email'    => $request->email,
            'idPlan'    => '1',
        ]);
        $admAccounts->save();
        $idAccount = $admAccounts->id;
   
        $dateCreated = Carbon::now();
        $dateCreated->toDateTimeString(); // 1975-12-25 14:15:16
        $secCompanies = new secCompanies([
            'idAccount'     => $idAccount,
            'companyName'    => $request->companyName,
            'idActivity'    => '1',
            'created'=>  $dateCreated,
        ]);
        $secCompanies->save();
        $idCompany = $secCompanies->id;

        $user = new User([
            'name'     => $request->name,
            'email'    => $request->email,
            'cellPhone'    => $request->cellPhone,
            'password' => bcrypt($request->password),        
        ]);
        $user->save();
        $idUser = $user->id;
        $user->contas()->attach($idAccount); 
        $admAccounts->usuarios()->attach($idUser);
                
        return response()->json([
            'message' => 'Successfully created user!!!'], 201);
    }
