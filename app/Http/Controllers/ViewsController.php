<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Views;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ViewsController extends Controller {
    // http://www.sqlines.com/mysql/how-to/select-update-single-statement-race-condition
    public function increment($article_id) {
    }
}
