<?php

namespace App\Http\Controllers\Api;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index (){
        
        return Tag::all();
    }
}
