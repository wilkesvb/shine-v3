<nav class="emp-bar">

    <div class="wrap">
        <table width="100%" cellpadding="0" cellspacing="0">
        <td style="text-align:left">
            <span>

                <?php global $current_user;
                  wp_get_current_user();

                  echo 'Hello, ' . $current_user->first_name . "\n"; ?>

            </span>
        </td>
        <td style="text-align:center">
            <span>
                <?php 

                    echo current_time( 'l, F jS, Y', $gmt = -4 ); 

                ?>
            </span>

        </td>
        <td style="text-align:right">
            <a href="/membership-login/?swpm-logout=true">Log Out</a>
        </td>
    </table>
        
    </div>

</nav>