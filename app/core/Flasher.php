<?php
class Flasher
{


    public static function setFlash($message, $action, $type)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'action' => $action,
            'type' => $type
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '
            <div class="alert text-white ' . $_SESSION['flash']['type'] . '" role="alert">
                <div class="iq-alert-icon">
                    <i class="ri-information-line"></i>
                </div>
                <div class="iq-alert-text">
                ' . $_SESSION['flash']['message'] . ' 
                ' . $_SESSION['flash']['action'] . '
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            ';
            unset($_SESSION['flash']);
        }
    }
}
