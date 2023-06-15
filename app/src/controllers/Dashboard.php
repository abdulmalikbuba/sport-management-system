
<?php

use GuzzleHttp\Promise\Create;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;
use SilverStripe\Control\HTTPRequest;

class   DashboardController extends SecuredPageController
{

    private static $allowed_actions = [
        'teachers',
        'students',
        'sports',
        'events'
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
            JS
        );

    }


    //links for routing
    public function Link($action = null)
    {
        return "dashboard/$action";
    }

    public function index(HTTPRequest $request)
    {
        return $this->customise([
            'PageTitle' => 'Dashboard'
        ]);
    }

    public function teachers()
    {
        return $this->customise([
            'PageTitle' => 'Teachers'
        ]);
    }

    public function students()
    {
        return $this->customise([
            'PageTitle' => 'Students'
        ]);
    }

    public function sports()
    {
        return $this->customise([
            'PageTitle' => 'Sports'
        ]);
    }

    public function events()
    {
        return $this->customise([
            'PageTitle' => 'Events'
        ]);
    }

}