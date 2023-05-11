<?php

namespace App\Http\Controllers\investigator;

use App\Http\Controllers\Controller;
use App\Models\AvailabilityDistance;
use App\Models\AvailabilityTime;
use App\Models\Document;
use App\Models\Equipement;
use App\Models\Language;
use App\Models\Licensing;
use App\Models\ServiceLine;
use App\Models\WorkVehicle;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InvestigatorServiceLine;
use Illuminate\Support\Facades\Auth;

class InvestigatorController extends Controller
{
    public function index()
    {
        return view('investigator.index');
    }

    public function viewProfile()
    {
        return view('investigator.profile');
    }

    public function store(Request $request)
    {
        $user_id= Auth::id();
        if (isset($request->phone)) {
            $request->validate([
                'phone' => 'required|digits:10'
            ]);
            $user = User::find($user_id);
            $user->phone = $request->phone;
            $user->save();
        }

        foreach ($request->investigation_type as $investigation_type) {
            $service= new InvestigatorServiceLine();
            if (!isset($investigation_type["type"]))
                continue;

            $service->investigation_type= $investigation_type["type"];
            $service->case_experience= $investigation_type["case_experience"];
            $service->years_experience= $investigation_type["years_experience"];
            $service->hourly_rate= $investigation_type["hourly_rate"];
            $service->travel_rate= $investigation_type["travel_rate"];
            $service->milage_rate= $investigation_type["milage_rate"];
            $service->user_id= $user_id;
            $service->save();
        }

        $equipement= new Equipement();
        $equipement->camera_type= $request->camera_type;
        $equipement->dashcam= isset($request->dashcam);
        $equipement->convert_video= isset($request->convert_video);
        $equipement->camera_model_number= $request->camera_model_number;
        $equipement->user_id= $user_id;
        $equipement->save();

        foreach ($request->licencing as $licencing) {
            $licence= new Licensing();
            $licence->state= $licencing['state'];
            $licence->license_number= $licencing['license_number'];
            $licence->expiration_date= $licencing['expiration_date'];
            $licence->insurance= isset($licencing['insurance']);
            $licence->bonded= isset($licencing['bonded']);
            $licence->user_id= $user_id;
            $licence->save();
        }

        foreach ($request->work_vehicle as $index => $work_vehicle) {
            $picture_path = $request->file('work_vehicle')[$index]["picture"]->store('public');
            $proof_of_insurance_path = $request->file('work_vehicle')[$index]["proof_of_insurance"]->store('public');

            $vehicle= new WorkVehicle();
            $vehicle->years= $work_vehicle['year'];
            $vehicle->make= $work_vehicle['make'];
            $vehicle->model= $work_vehicle['model'];
            $vehicle->picture= $picture_path;
            $vehicle->insurance_company= $work_vehicle['insurance_company_name'];
            $vehicle->policy_number= $work_vehicle['policy_number'];
            $vehicle->expiration_date= $work_vehicle['expiration_date'];
            $vehicle->insurance_proof= $proof_of_insurance_path;
            $vehicle->user_id= $user_id;
            $vehicle->save();
        }

        foreach ($request->languages_spoken as $languages_spoken) {
            $language= new Language();
            $language->language= $languages_spoken['language'];
            $language->fluency= $languages_spoken['fluency'];
            $language->user_id= $user_id;
            $language->save();
        }

        $document_dl_path = $request->file('document_dl')->store('public');
        $document_id_path = $request->file('document_id')->store('public');
        $document_ssn_path = $request->file('document_ssn')->store('public');
        $document_birth_certificate_path = $request->file('document_birth_certificate')->store('public');
        $document_form_19_path = $request->file('document_form_19')->store('public');
        $document= new Document();
        $document->dl= $document_dl_path;
        $document->id_file= $document_id_path;
        $document->ssn= $document_ssn_path;
        $document->birth= $document_birth_certificate_path;
        $document->form_19= $document_form_19_path;
        $document->user_id= $user_id;
        $document->save();

        $time= new AvailabilityTime();
        $time->days= $request->availability_days;
        $time->hours= $request->availability_hours;
        $time->user_id= $user_id;
        $time->save();

        $distance= new AvailabilityDistance();
        $distance->distance= $request->availability_distance;
        $distance->user_id= $user_id;
        $distance->save();

        echo "Data saved";
    }

}
