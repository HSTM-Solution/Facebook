<?php
/**
 * Created by PhpStorm.
 * User: Mr.DCode
 * Date: 8/10/2017
 * Time: 7:35 PM
 */
?>
<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '1658893667468260','6f57186973b3d37f25682248597feda8' );
$session = new FacebookSession( $_SESSION['fb_token']);
$request = new FacebookRequest($session, 'GET', '/me/albums');
$response = $request->execute();
$graphObject = $response->getGraphObject();
$data=(array)$graphObject->getProperty("data");

foreach($data as $tmp)
{
    foreach($tmp as $temp)
    {
        print "</br>";
        echo "<a href='ViewAlbum.php?id=".$temp->id."'>".$temp->name."</a>";
    }
}
?>