<?
function getAgentData ($id) {
  $cGetLead = curl_init("https://api.sierrainteractivedev.com/leads/get/".$id."?includeSavedSearches=true&includeTags=true&includeActionPlans=true");

  curl_setopt($cGetLead, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Sierra-ApiKey:ba5d2b88-642d-4629-a2ca-30c3dcab34a5"));
  curl_setopt($cGetLead, CURLOPT_RETURNTRANSFER, true);
  $cleadData = curl_exec($cGetLead);
  $leadData = json_decode($cleadData);
  curl_close($cGetLead);
  return $cGetLead;
}
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.sierrainteractivedev.com/agents/find?pageSize=100&officeType=ignore',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Sierra-ApiKey: ba5d2b88-642d-4629-a2ca-30c3dcab34a5'
  ),
));

$response = curl_exec($curl);

curl_close($curl);