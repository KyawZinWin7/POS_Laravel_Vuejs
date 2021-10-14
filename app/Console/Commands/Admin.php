<?php
namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
class Admin extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'command:admin';

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
    $user           = new User;
    $user->name     = 'Admin';
    $user->email    = 'admin@gothailand.online';
    $user->password = Hash::make('password');
    $user->save();
  }
}