
<?php

use GuzzleHttp\Promise\Create;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Assets\Upload;
use SilverStripe\Assets\File;
use SilverStripe\Forms\FileField;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\ArrayList;
use SilverStripe\Security\Group;
use SilverStripe\ORM\FieldType\DBDatetime;

class   DashboardController extends SecuredPageController
{

    private static $allowed_actions = [
        'teachers',
        'students',
        'sports',
        'events',
        'athleteRegistrationForm',
        'addSportsForm',
        'student_details',
        'editAthleteProfile',
        'addTeacherForm',
        'teacher_details',
        'edit_student',
        'editStudentDetailsForm',
        'doUpdate',
        'delete_student',
        'eventForm',
        'delete_event',
        'delete_sport',
        'profile',
        'edit_profile',
        'editProfileForm',
        'sports_detailpage',
        'delete_teacher',
        'event_detailpage',
        'edit_event',
        'doEditEvent'
    ];

    public function init()
    {
        parent::init();

        $ThemeDir =  "app/";


        Requirements::css($ThemeDir . 'css/style.css');
        
        Requirements::css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
        Requirements::css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css');

        Requirements::javascript('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js');
        Requirements::javascript(' https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js'); 
        Requirements::javascript(' https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js'); 
       
        // datatable
        Requirements::css('//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css');
        Requirements::css('https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css');
        Requirements::css('https://use.fontawesome.com/releases/v5.6.3/css/all.css');
        Requirements::css('https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css');
        Requirements::css('https://cdn.datatables.net/autofill/2.3.9/css/autoFill.dataTables.min.css');
        Requirements::css('https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css');
        Requirements::css('https://cdn.datatables.net/colreorder/1.5.5/css/colReorder.dataTables.min.css');
        Requirements::css('https://cdn.datatables.net/1.11.5/css/dataTables.jqueryui.min.css');
        Requirements::css('https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css');
        Requirements::css('https://cdn.datatables.net/rowgroup/1.1.4/css/rowGroup.dataTables.min.css');
        Requirements::css('https://cdn.datatables.net/scroller/2.0.5/css/scroller.dataTables.min.css');
        Requirements::css('https://cdn.datatables.net/autofill/2.3.7/css/autoFill.jqueryui.min.css');
        Requirements::css('https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css');
        Requirements::css('https://cdn.datatables.net/buttons/2.2.2/css/buttons.jqueryui.min.css');
        Requirements::css('https://cdn.datatables.net/colreorder/1.5.5/css/colReorder.jqueryui.min.css');
        Requirements::css('https://cdn.datatables.net/keytable/2.6.4/css/keyTable.dataTables.min.css');
        Requirements::css('https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css');
        Requirements::css('https://unpkg.com/feather-icons');
        Requirements::css('https://cdn.datatables.net/scroller/2.0.5/css/scroller.dataTables.min.css');

        Requirements::javascript('https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js');
        Requirements::javascript('https://kit.fontawesome.com/6dc44d80e7.js');
        Requirements::javascript('https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js');
        Requirements::javascript('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js');
        Requirements::javascript('//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js');
        Requirements::javascript('https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js');
        Requirements::javascript('https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table-locale-all.min.js');
        Requirements::javascript('https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js');
        Requirements::javascript('https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/export/bootstrap-table-export.min.js');
        Requirements::javascript('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js');
        Requirements::javascript('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
        Requirements::javascript('https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js');
        // pagination
        Requirements::javascript('https://cdn.datatables.net/plug-ins/1.11.5/pagination/jPaginator/dataTables.jPaginator.js');
        Requirements::javascript('https://cdn.datatables.net/plug-ins/1.11.5/pagination/ellipses.js');
        Requirements::javascript('https://cdn.datatables.net/plug-ins/1.11.5/pagination/four_button.js');
        Requirements::javascript('https://cdn.datatables.net/plug-ins/1.11.5/pagination/full_numbers_no_ellipses.js');
        Requirements::javascript('https://cdn.datatables.net/plug-ins/1.11.5/pagination/select.js');
        Requirements::javascript('https://cdn.datatables.net/plug-ins/1.11.5/pagination/simple_incremental_bootstrap.js');
        Requirements::javascript('https://cdn.datatables.net/autofill/2.3.9/js/dataTables.autoFill.min.js');
        Requirements::javascript('https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js');
        Requirements::javascript('https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js');
        Requirements::javascript('https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js');
        Requirements::javascript('https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js');
        Requirements::javascript('https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');
        Requirements::javascript('https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js');
        Requirements::javascript('https://cdn.datatables.net/1.11.5/js/dataTables.jqueryui.min.js');
        Requirements::javascript('https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js');
        Requirements::javascript('https://cdn.datatables.net/rowgroup/1.1.4/js/dataTables.rowGroup.min.js');
        Requirements::javascript('https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js');
        Requirements::javascript('https://cdn.datatables.net/autofill/2.3.7/js/dataTables.autoFill.min.js');
        Requirements::javascript('https://cdn.datatables.net/autofill/2.3.7/js/autoFill.jqueryui.min.js');
        Requirements::javascript('https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js');
        Requirements::javascript('https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js');
        Requirements::javascript('https://cdn.datatables.net/buttons/2.2.2/js/buttons.jqueryui.min.js');
        Requirements::javascript('https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js');
        Requirements::javascript('https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js');
        Requirements::javascript('https://cdn.datatables.net/colreorder/1.5.5/js/dataTables.colReorder.min.js');
        Requirements::javascript('https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js');
        Requirements::javascript('https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js');
        Requirements::javascript('https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js');
        Requirements::javascript('https://cdn.datatables.net/keytable/2.6.4/js/dataTables.keyTable.min.js');
        Requirements::javascript('https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js');
        Requirements::javascript('https://unpkg.com/feather-icons');
        Requirements::javascript('https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js');
        Requirements::javascript('https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js');
        Requirements::javascript('https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');



       //eterna Js
        Requirements::customScript(
            <<<JS
                $(document).ready(function() {
                    $('#myTable').DataTable();
                });

                // $(document).ready(function () {
                //     setTimeout(function () {
                //         $(".fade").fadeOut("slow", function () {
                //         $(".fade").remove();
                //         });
                //     }, 5000);
                // });
            JS
        );

    }


    //links for routing
    public function Link($action = null)
    {
        return "dashboard/$action";
    }

    // dashboard page
    // public function index(HTTPRequest $request)
    // {
    //     $students = Athletes::get()->filter(["Deleted" => "0"]);
    //     // $teachers = Teachers::get();
    //     $sports = Sports::get();
    //     $events = Events::get();
    //     // $awards = Awards::get();
    //     return $this->customise([
    //         'PageTitle' => 'Dashboard',
    //         "TotalStudents" => $students,
    //         // "TotalTeachers" => $teachers,
    //         "TotalSports" => $sports->count(),
    //         "TotalEvents" => $events->count(),
    //     ]);
    // }

    public function index(HTTPRequest $request)
    {
        // $students = Athletes::get();
        $now = DBDatetime::now()->getValue();
        $upcomingEvents = Events::get()->filter('Date:GreaterThanOrEqual', $now);
        // $events = Events::get();

        return $this->customise([
            'PageTitle' => 'Dashboard',
            // 'TotalStudents' => $students,
            // 'Events' => $events,
            'UpcomingEvents' => $upcomingEvents
        ]);
    }

    // show all teachers
    // public function teachers()
    // {
    //     $teachers = Member::get();

    //     return $this->customise([
    //         'PageTitle' => 'Teachers / Coaches',
    //         'Teachers' => $teachers
    //     ]);
    // }

    public function teachers()
    {
        $groupCodeName = 'users';

        $group = Group::get()->filter('Code', $groupCodeName)->first();

        if ($group) {
            $members = $group->Members();
            $data = [
                'PageTitle' => 'Teachers / Coaches',
                'Teachers' => $members,
            ];
            return $this->customise($data)->render();
        }

        return $this->customise([
            'Teachers' => ArrayList::create(), // or an empty ArrayList depending on your requirements
        ]);
        
    }

    // show teacher details
    public function teacher_details(HTTPRequest $request)
    {
        $id = $request->param('ID');

        $teacherDetails = Member::get()->byID($id);

        return $this->customise([
            'PageTitle' => 'Teacher\'s Details',
            'TeacherDetails' => $teacherDetails,
        ]);
    }

    // show all athletes or students
    public function students()
    {
        $athlete = Athletes::get();

        return $this->customise([
            'PageTitle' => 'Students / Athletes',
            'Athletes' => $athlete
        ]);
    }

    // Handle student detail page
    public function student_details(HTTPRequest $request)
    {
        $id = $request->param('ID');

        $sports = Sports::get();

        $athleteDetails = Athletes::get()->byID($id);

        return $this->customise([
            'PageTitle' => 'Athlete\'s Details',
            'AthleteDetails' => $athleteDetails,
            'Sports' => $sports
        ]);
    }

    // page to edit student profile
    public function edit_student(HTTPRequest $request)
    {
        $id = $request->param("ID");

        $editAthlete = Athletes::get()->byID($id);

        $sports = Sports::get();
        
        return $this->customise([
            'PageTitle' => 'Edit Athlete',
            'EditAthlete'=> $editAthlete,
            'Sports' => $sports
        ]);
    }

    // show all sporting activities
    public function sports(HTTPRequest $request)
    {
        $sportsid = $request->param("ID");

        $athlete = Athletes::get()->filter(["SportsID" => $sportsid]);

        $sports = Sports::get();

        return $this->customise([
            'PageTitle' => 'Sports / Games',
            'Sports' => $sports,
            'Athletes' => $athlete
        ]);
    }

    public function sports_detailpage(HTTPRequest $request)
    {
        $sportsid = $request->param("ID");

        // $sports = Sports::get();

        $athlete = Athletes::get()->filter(["SportsID" => $sportsid]);
        
        // $firstAthlete = $athlete->first();

        // if ($firstAthlete) {
        //     $pageTitle = $firstAthlete->sports->first()->title ?? '';
        // } else {
        //     $pageTitle = '';
        // }
        
        return $this->customise([
            'PageTitle' => $athlete->first()->Sports()->Title,
            // 'PageTitle' => $pageTitle,
            'Athletes' => $athlete
        ]);
    }

    public function events()
    {
        $events = Events::get()->sort('Created', 'DESC');
        return $this->customise([
            'PageTitle' => 'Events / Games',
            'Events' => $events
        ]);
    }

    public function event_detailpage(HTTPRequest $request)
    {
        $id = $request->param('ID');

        $eventDetails = Events::get()->byID($id);
        
        return $this->customise([
            'PageTitle' => 'Event Details',
            'Event' => $eventDetails
        ]);
    }

    public function edit_event(HTTPRequest $request)
    {
        $id = $request->param("ID");

        $editEvent = Events::get()->byID($id);
        
        return $this->customise([
            'PageTitle' => 'Edit Event',
            'EditEvent'=> $editEvent,
        ]);
    }

    // Athlete Registration form
    public function athleteRegistrationForm()
    {
        return AthleteRegistrationForm::create($this, __FUNCTION__);
    }

    // Sports addition form
    public function addSportsForm()
    {
        return AddSportsForm::create($this, __FUNCTION__);
    }

    // Teacher Registration form
    public function addTeacherForm()
    {
        return AddTeacherForm::create($this, __FUNCTION__);
    }

    // Edit student or athlete's profile form
    public function editStudentDetailsForm()
    {
        return EditStudentDetailsForm::create($this, __FUNCTION__);
    }

    public function eventForm()
    {
        return AddEventsForm::create($this, __FUNCTION__);
    }

    public function editEventForm()
    {
        return EditEventForm::create($this, __FUNCTION__);
    }

    // public function editevent($request)
    // {
    //     $id = $request->param('ID');
    //     $event = Events::get()->byID($id);

    //     if ($event) {
    //         $form = EditEventForm::create($this, 'EditForm', $event);
    //         $form->setFormAction($this->Link("editevent/{$id}"));

    //         return [
    //             'Form' => $form,
    //             'Event' => $event
    //         ];
    //     }

    // }

    // public function edit($request)
    // {
    //     $id = $request->param('ID');
    //     $athlete = Athletes::get()->byID($id);

    //     if ($athlete) {
    //         $form = EditStudentDetailsForm::create($this, 'EditForm', $athlete);
    //         $form->setFormAction($this->Link("edit/{$id}"));

    //         return [
    //             'Form' => $form,
    //             'Athlete' => $athlete
    //         ];
    //     }

    // }

    // public function doUpdate($request)
    // {
    //     $id = $request->param('ID');
    //     $athlete = Athletes::get()->byID($id);

    //     if ($athlete) {
    //         $form = EditStudentDetailsForm::create($this, 'EditForm', $athlete);
    //         $form->setFormAction($this->Link("doUpdate/{$id}"));
    //         $form->loadDataFrom($request->getPostVars());
            
    //         if ($form->isValid()) {
    //             $form->saveInto($athlete);
    //             $athlete->write();
    //             $this->setSessionMessage('Profile updated successfully.', 'good');
    //             return $this->redirectBack();
    //         } else {
    //             // Handle form validation errors
    //             // ...
    //         }
    //     }

    //     // Handle the case when the athlete is not found
    //     // ...
    // }

    public function doUpdate(HTTPRequest $request)
    {
        $id = $request->postVar('ID');

        $Name = $request->postVar('Name');

        $DateOfBirth = $request->postVar('DateOfBirth');

        $EmailAddress = $request->postVar('EmailAddress');

        $Gender = $request->postVar('Gender');

        $Class = $request->postVar('Class');

        $Program = $request->postVar('Program');

        $House = $request->postVar('House');

        $Telephonenumber = $request->postVar('TelephoneNumber');
        
        $SportsID = $request->postVar('SportsID');

        $Height = $request->postVar('Height');

        $Weight = $request->postVar('Weight');

        // $PhotoID = $request->postVar('PhotoID');

        $update = Athletes::get()->filter(["ID" => $id])->first();

        if ($update) 
        {   
            $update->Name = $Name;

            $update->DateOfBirth = $DateOfBirth;

            $update->EmailAddress = $EmailAddress;

            $update->Gender = $Gender;

            $update->Class = $Class;

            $update->Program = $Program;

            $update->House = $House;

            $update->TelephoneNumber = $Telephonenumber;

            $update->SportsID = $SportsID;

            $update->Height = $Height;

            $update->Weight = $Weight;

            // Handle profile photo upload
            // if ($request->isPOST() && isset($_FILES['PhotoID']['tmp_name'])) {
            //     $uploadedFile = $_FILES['PhotoID'];
            //     $upload = Upload::create();
            //     $file = new Image();
            //     $file->setFromLocalFile($uploadedFile['tmp_name'], $uploadedFile['name']);
            //     $file->write();
            //     $upload->File = $file;
            //     $upload->write();
            //     $update->PhotoID = $upload->ID;
            // }

            // $uploadField = UploadField::create('PhotoID', 'Profile Photo');
            // $uploadField->setFolderName('profile-photos');
            // $uploadField->storeUploadAs($update->ID . '-photo.jpg');

            $update->write();

            $this->setSessionMessage('Profile updated successfully.', 'good');
        }

        return $this->redirectBack();

    }

    // Delete student or athlete from system
    // public function delete_student(HTTPRequest $request)
    // {
    //     $id = $request->param("ID");

    //     $deleteAthlete = Athletes::get()->filter(["ID" => $id])->first();

    //     if($deleteAthlete)
    //     {
    //         $deleteAthlete->Deleted = 1;
    //         $deleteAthlete->write();
    //     }

    //    return  $this->redirect('dashboard/students/');
    // }
    public function delete_student(HTTPRequest $request)
    {
        $id = $request->param("ID");
        $athlete = Athletes::get()->byID($id);

        if ($athlete) {
            $athlete->delete();

            // Set a success message and redirect
            $this->setSessionMessage('Athlete deleted successfully!', 'good');
            return $this->redirectBack();
        } else {
            // Set an error message and redirect
            $this->setSessionMessage('Athlete not found.', 'bad');
            return $this->redirectBack();
        }
    }

    public function delete_sport(HTTPRequest $request)
    {
        $id = $request->param("ID");
        $sport = Sports::get()->byID($id);

        if ($sport) {
            $sport->delete();

            // Set a success message and redirect
            $this->setSessionMessage('Sports deleted successfully!', 'good');
            return $this->redirectBack();
        } else {
            // Set an error message and redirect
            $this->setSessionMessage('Sports not found.', 'bad');
            return $this->redirectBack();
        }
    }
    
    public function delete_event(HTTPRequest $request)
    {
        $id = $request->param("ID");
        $event = Events::get()->byID($id);

        if ($event) {
            $event->delete();

            // Set a success message and redirect
            $this->setSessionMessage('Event deleted successfully!', 'good');
            return $this->redirectBack();
        } else {
            // Set an error message and redirect
            $this->setSessionMessage('Event not found.', 'bad');
            return $this->redirectBack();
        }
    }

    public function doEditEvent(HTTPRequest $request)
    {
        $id = $request->postVar('ID');

        $Title = $request->postVar('Title');

        $Date = $request->postVar('Date');

        $Venue = $request->postVar('Venue');

        $update = Events::get()->filter(["ID" => $id])->first();

        if ($update) 
        {   
            $update->Title = $Title;

            $update->Date = $Date;

            $update->Venue = $Venue;

            $update->write();

            $this->setSessionMessage('Event updated successfully.', 'good');
        }

        return $this->redirectBack();
    }

    public function profile()
    {
        return $this->customise([
            'PageTitle' => 'My Profile',
        ]);
    }

    public function edit_profile()
    {
        return $this->customise([
            'PageTitle' => 'Edit Profile',
        ]);
    }

    public function editProfileForm()
    {
        return EditProfileForm::create($this, __FUNCTION__);
    }

    public function delete_teacher(HTTPRequest $request)
    {
        $memberID = $request->param("ID");

        $member = Member::get()->byID($memberID);

        if ($member && $member->exists()) {
            // Check if the member exists and is not already deleted
            $member->delete();
            // The member will be deleted from the database
            $this->setSessionMessage('Coach has been deleted successfully!', 'good');
            return $this->redirectBack();
        } else {
            // Handle the case where the member doesn't exist or has already been deleted
            $this->setSessionMessage('Coach not found.', 'bad');
            return $this->redirectBack();
        }
    }

}