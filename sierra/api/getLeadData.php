<?
function getLeadData ($id) {
  $cGetLead = curl_init("https://api.sierrainteractivedev.com/leads/get/".$id."?includeSavedSearches=true&includeTags=true&includeActionPlans=true");

  curl_setopt($cGetLead, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Sierra-ApiKey:ba5d2b88-642d-4629-a2ca-30c3dcab34a5"));
  curl_setopt($cGetLead, CURLOPT_RETURNTRANSFER, true);
  $cleadData = curl_exec($cGetLead);
  $leadData = json_decode($cleadData);
  curl_close($cGetLead);
  return $cGetLead;
}