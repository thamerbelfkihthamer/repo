<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function Acl()
{

    $acl = new Zacl();
    $is_allowed = $acl->check_acl(CI::$APP->router->fetch_module() . '/' . CI::$APP->router->fetch_class() . '/' . CI::$APP->router->fetch_method(), CI::$APP->session->userdata('group_name'));
    if (!$is_allowed) {
        show_error("Vous n'avez pas accès à cette resource", 500, "Permission Denied");
    }
}