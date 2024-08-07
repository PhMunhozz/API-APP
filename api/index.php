<?

// default response
$data['status'] = 'ERROR';
$data['data'] = null;

// check request
if(isset($_GET['option'])){
    
    switch ($_GET['option']) {
        case 'status':
            define_response($data, 'API running OK!');
            break;

        case 'random':
            // default values
            $min = 0;
            $max = 1000;

            // verify if request is sending min and max values  
            if(isset($_GET['min'])) $min = intval($_GET['min']);
            if(isset($_GET['max'])) $max = intval($_GET['max']);

            if($min > $max) {
                response($data);
                return;
            }

            define_response($data, rand($min, $max));
            break;
    }
}

// send API response
response($data);


// functions

// define response
function define_response(&$data, $value) {
    $data['status'] = 'SUCCESS';
    $data['data'] = $value;
}

// response construction
function response($data_response) {
    header('Content-Type: application/json');
    echo json_encode($data_response);
}