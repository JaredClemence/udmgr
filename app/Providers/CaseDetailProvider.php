<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\UD\Party;
use App\Models\UD\Role;
use App\Models\UD\LegalCase;
use App\Models\UD\DataStructure\CaseBrief;
use Illuminate\Support\Facades\DB;

class CaseDetailProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function getActiveCaseCards(User $user){
      $plaintiffTable = DB::table('parties')->selectRaw('legal_case_id, min(short) as plaintiff')->where('type','=',Party::PLAINTIFF)->groupBy('legal_case_id')->orderBy('legal_case_id','asc')->orderBy('plaintiff','asc');
      $defendantTable = DB::table('parties')->selectRaw('legal_case_id, min(short) as defendant')->where('type','=',Party::DEFENDANT)->groupBy('legal_case_id')->orderBy('legal_case_id','asc')->orderBy('defendant','asc');
      $cases = DB::table('legal_cases')
      ->leftJoin('roles','legal_cases.id','=','roles.legal_case_id')
      ->joinSub($plaintiffTable, 'plaintiffTable', function($join){
        $join->on('legal_cases.id','=','plaintiffTable.legal_case_id');
      })
      ->joinSub($defendantTable, 'defendantTable', function($join){
        $join->on('legal_cases.id','=','defendantTable.legal_case_id');
      })
      ->get()->map( function($result){
         $caseCard = new CaseBrief();
         $caseCard->number = $result->number;
         $caseCard->name = $result->plaintiff . " v " . $result->defendant;
         $type = null;
         switch( $result->type ){
           case Role::ATTORNEY:
           case Role::LEGAL_TEAM:
             $type="Admin";
             break;
           default:
             $type="User";
         }
         $caseCard->userType = $type;
         return $caseCard;
      } );
      return $cases;
    }
}
