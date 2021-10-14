<?php
namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\ChartOfAccount;
use Illuminate\Console\Command;

class CreateCOAData extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'create:coa';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct() {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle() {
    $records = [
      [
        'name'        => 'Cash', 
        'group'       => 'asset',
        'id'          => '1000',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'name'        => 'Equipments', 
        'group'       => 'asset',
        'id'          => '1001',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'name'        => 'Office Devices', 
        'group'       => 'asset',
        'id'          => '1002',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'name'        => 'Account Payable', 
        'group'       => 'asset',
        'id'          => '1003',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'name'        => 'Owner Equity', 
        'group'       => 'capital',
        'id'          => '2000',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'name'        => 'Note Payable', 
        'group'       => 'liability',
        'id'          => '3000',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'name'        => 'Sale Tax', 
        'group'       => 'liability',
        'id'          => '3001',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'name'        => 'Wht Tax', 
        'group'       => 'liability',
        'id'          => '3002',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'name'        => 'Revenue', 
        'group'       => 'revenue',
        'id'          => '4000',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'name'        => 'Expense', 
        'group'       => 'expense',
        'id'          => '5000',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'name'        => 'Purchase tax', 
        'group'       => 'expense',
        'id'          => '5001',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
    ];
    ChartOfAccount::truncate();
    ChartOfAccount::insert($records);
  }
}
