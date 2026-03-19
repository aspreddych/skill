<?php
namespace App\Http\Controllers;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class TrendController extends Controller
{
    public function index()
    {
        return view('job-trends');
    }

    public function getData(Request $request)
    {
        $from = $request->from
            ? Carbon::parse($request->from)->startOfDay()
            : Carbon::now()->subDays(6)->startOfDay();

        $to = $request->to
            ? Carbon::parse($request->to)->endOfDay()
            : Carbon::now()->endOfDay();

        $jobs = JobPost::join('companies', 'companies.id', '=', 'job_posts.company_id')
                    ->join('job_categories', 'job_categories.id', '=', 'job_posts.category_id')
                    ->whereBetween('job_posts.created_at', [$from, $to])
                    ->select(
                        DB::raw('DATE(job_posts.created_at) as date'),
                        'companies.name as company',
                        'job_categories.name as category',
                        DB::raw('COUNT(*) as total')
                    )
                    ->groupBy(
                        DB::raw('DATE(job_posts.created_at)'),
                        'companies.name',
                        'job_categories.name'
                    )
                    ->orderBy('date')
                    ->get();

        return response()->json($jobs);
    }
}