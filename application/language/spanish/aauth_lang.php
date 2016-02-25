<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* E-mail Messages */
// Account verification
$lang['aauth_email_verification_subject'] = 'Verificaci�n de Cuenta';
$lang['aauth_email_verification_code'] = 'Tu c�digo de verificaci�n es: ';
$lang['aauth_email_verification_text'] = " Tambi�n puedes hacer click (o copia y pega en tu navegador) en el siguiente link. \n\n";
// Password reset
$lang['aauth_email_reset_subject'] = 'Reiniciar contrase�a';
$lang['aauth_email_reset_text'] = "Para reiniciar la contrase�a click (o copia y pega en tu navegador) el siguiente link:\n\n";
// Password reset success
$lang['aauth_email_reset_success_subject'] = 'Constrase�a reiniciada exitosamente';
$lang['aauth_email_reset_success_new_password'] = 'Tu contrase�a ha sido correctamente reiniciada. Tu nueva contrase�a es : ';
/* Error Messages */
// Account creation errors
$lang['aauth_error_email_exists'] = 'El correo electr�nico ya existe. Si olvidaste tu contrase�a, puedes hacer click en el siguiente link.';
$lang['aauth_error_username_exists'] = "Ya existe una cuenta con ese nombre de usuario. Por favor ingrese un nombre de usuario diferente, o si olvidaste tu contrase�a puedes hacer click en el siguiente link.";
$lang['aauth_error_email_invalid'] = 'Correo electr�nico inv�lido';
$lang['aauth_error_password_invalid'] = 'Contrase�a invalida';
$lang['aauth_error_username_invalid'] = 'Nombre de usuario invalido';
$lang['aauth_error_username_required'] = 'Nombre de usuario obligatorio';
$lang['aauth_error_totp_code_required'] = 'El c�digo TOTP es obligatorio';
$lang['aauth_error_totp_code_invalid'] = 'C�digo TOTP obligatorio';
// Account update errors
$lang['aauth_error_update_email_exists'] = 'El correo electr�nico ya existe, por favor ingresa un correo electr�nico diferente.';
$lang['aauth_error_update_username_exists'] = "El nombre de usuario ya existe, por favor ingresa un nombre de usuario diferente.";
// Access errors
$lang['aauth_error_no_access'] = 'Ups, lo siento, no tienes permiso para ver el recurso solicitado.';
$lang['aauth_error_login_failed_email'] = 'El Correo electr�nico y contrase�a no coinciden.';
$lang['aauth_error_login_failed_name'] = 'El Nombre de usuario y contrase�a no coinciden.';
$lang['aauth_error_login_failed_all'] = 'El Correo electr�nico, nombre de usuario y contrase�a no coinciden.';
$lang['aauth_error_login_attempts_exceeded'] = 'Has excedido el n�mero de intentos de inicio de sesi�n, tu cuenta ha sido bloqueada.';
$lang['aauth_error_recaptcha_not_correct'] = 'Ups, El texto ingresado es incorrecto.';
// Misc. errors
$lang['aauth_error_no_user'] = 'El usuario no existe.';
$lang['aauth_error_account_not_verified'] = 'Tu cuenta a�n no ha sido verificada, por favor revisa tu correo electr�nico y verifica tu cuenta.';
$lang['aauth_error_no_group'] = 'El grupo no existe';
$lang['aauth_error_self_pm'] = 'No es posible enviarte un mensaje a ti mismo.';
$lang['aauth_error_no_pm'] = 'Mensaje privado no encontrado';
/* Info messages */
$lang['aauth_info_already_member'] = 'El usuario ya esta miembro del grupo';
$lang['aauth_info_group_exists'] = 'El nombre del grupo ya existe';
$lang['aauth_info_perm_exists'] = 'El nombre del permiso ya existe';
