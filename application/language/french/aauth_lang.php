<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* E-mail Messages */
// Account verification
$lang['aauth_email_verification_subject'] = 'V�rification de Compte';
$lang['aauth_email_verification_code'] = 'Votre code de v�rification est: ';
$lang['aauth_email_verification_text'] = " Vous pouvez �galement cliquer sur (ou copier coller) le lien suivant.\n\n";
// Password reset
$lang['aauth_email_reset_subject'] = 'R�initialiser le mot de passe';
$lang['aauth_email_reset_text'] = "Pour r�initialiser votre mot de passe cliquez sur (ou copiez collez dans la barre d'adresse de votre navigateur) le lien ci-dessous:\n\n";
// Password reset success
$lang['aauth_email_reset_success_subject'] = "R�initialisation de mot de passe r�ussie";
$lang['aauth_email_reset_success_new_password'] = "Votre mot de passe a �t� r�initialis� avec succ�s. Votre nouveau mot de passe est: ";
/* Error Messages */
// Account creation errors
$lang['aauth_error_email_exists'] = "Cette adresse email est d�j� utilis�e. Si vous avez oubli� votre mot de passe cliquez sur le lien ci-dessous.";
$lang['aauth_error_username_exists'] = "Un compte avec ce nom d'utilisateur existe d�j�. Merci de renseigner un nom d'utilisateur diff�rent. Si vous avez oubli� votre mot de passe cliquez sur le lien ci-dessous.";
$lang['aauth_error_email_invalid'] = "Adresse email invalide";
$lang['aauth_error_password_invalid'] = "Mot de passe invalide";
$lang['aauth_error_username_invalid'] = "Nom d'utilisateur invalide";
$lang['aauth_error_username_required'] = "Nom d'utilisateur requis";
$lang['aauth_error_totp_code_required'] = "Code TOTP requis";
$lang['aauth_error_totp_code_invalid'] = "Code TOTP invalide";
// Account update errors
$lang['aauth_error_update_email_exists'] = "Cette adresse email est d�j� utilis�e. Merci de renseigner une adresse email diff�rente.";
$lang['aauth_error_update_username_exists'] = "Ce nom d'utilisateur est d�j� utilis�. Merci de renseigner un nom d'utilisateur diff�rent.";
// Access errors
$lang['aauth_error_no_access'] = "D�sol�, vous n'avez pas acc�s � cette ressource.";
$lang['aauth_error_login_failed_email'] = "L'adresse email et le mot de passe ne correspondent pas.";
$lang['aauth_error_login_failed_name'] = "Le nom d'utilisateur et le mot de passe ne correspondent pas.";
$lang['aauth_error_login_failed_all'] = "L'adresse email, le nom d'utilisateur ou le mot de passe ne correspondent pas.";
$lang['aauth_error_login_attempts_exceeded'] = "Vous avez d�pass� le nombre de tentatives de connexion autoris�es, votre compte a �t� bloqu�.";
$lang['aauth_error_recaptcha_not_correct'] = 'D�sol�, le texte renseign� pour le reCAPTCHA est incorrect.';
// Misc. errors
$lang['aauth_error_no_user'] = "L'utilisateur n'existe pas.";
$lang['aauth_error_account_not_verified'] = "Votre compte n'a pas �t� confirm�. Merci de v�rifier vos email et de confirmer votre compte.";
$lang['aauth_error_no_group'] = "Le groupe n'existe pas";
$lang['aauth_error_self_pm'] = "Il impossible de vous envoyer un message � vous-m�me.";
$lang['aauth_error_no_pm'] = "Message priv� introuvable";
/* Info messages */
$lang['aauth_info_already_member'] = "L'utilisateur est d�j� membre de ce groupe";
$lang['aauth_info_group_exists'] = "Ce nom de groupe existe d�j�";
$lang['aauth_info_perm_exists'] = "Ce nom de permission existe d�j�";
