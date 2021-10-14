<?php
namespace App\Console\Commands;

use App\Classes\Accounting;
use Illuminate\Console\Command;

class test extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'test';

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
    $accounting             = new Accounting();
    $accounting->account_id = 1;
    $accounting->total      = 100;
    $accounting->tax        = 7;
    $accounting->grandTotal = 107;
    $accounting->type       = 'sale';
    $accounting->save();
  }
}
