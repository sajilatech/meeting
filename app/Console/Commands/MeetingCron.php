<?php

namespace App\Console\Commands;
use App\Models\AssignTask;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;
use App\Models\Employee;
use Carbon\Carbon;
use File;
class MeetingCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meeting:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Meeting Notifications';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentTime = Carbon::now();
        $currentTime->setTimezone("Europe/Paris");
        $select_time=ltrim($currentTime->format('h:ia'), '0');

        $attributes_array=AssignTask::whereDate('starttime', '>=', $select_time)
        ->whereDate('endtime', '<=', $select_time)
        ->whereDate('created_at',  Carbon::now())
        ->get();

        foreach ($attributes_array  as $attributes){
            $this->starttime    = $attributes['starttime'];
            $this->endtime      = $attributes['endtime'];
            $this->date     = date('mdY');
           // $row= Employee::where('id',$attributes['employee_id'])->first();
           $employee_row=Employee::where('id',$attributes['employee_id'])->first();
            //$nama= $row->employee_name;
    
            $this->nama= $employee_row->employee_name;
            $data = $this->nama.", is busy from ".$this->starttime."to". $this->endtime ;
            $file = "upload_file/".$this->date.$this->nama."_freebusy";
            $namafile = "$file.txt";  
            Storage::disk('local')->put($namafile, $data);
        }
     
      $this->info('Hourly Update has been send successfully');
    }
}
