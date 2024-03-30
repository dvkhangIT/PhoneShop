<?php

namespace App\Providers;

use App\Models\Models\Category;
use Illuminate\Support\ServiceProvider;

use function Ramsey\Uuid\v1;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    $data['category'] = Category::all();
    view()->share($data);
  }
}
