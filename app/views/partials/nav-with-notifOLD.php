<header class="h-24 font-eurostile text-white text-xl font-extrabold" id="navbar">
        <!-- Whole NavBar Container -->
        <div class="h-full px-6 flex justify-between items-center">
            <!-- Main NavBar -->
            <nav class="flex w-1/2 h-full justify-between items-center">
                <a href="/">
                    <img class="h-16" src="assets/images/icons/ZealiaLogoStarTrail-2.png" alt="ZealiaLogoStarTrail-2.png"/>
                </a>

                <ul class=" flex w-4/5 justify-between font-semibold hover:drop-shadow-2xl">
                    <li>
                        <a href="/" class="">Home</a>
                    </li>
                    
                    <li>
                        <a href="<?php if (isset($_SESSION['user'])) {
                            if ($_SESSION['user']['account_type'] == 'admin') {
                                echo '/admin';
                            } else {
                                echo '/dashboard';
                            }
                        } else {
                            echo '/login';
                        } ?>" class="">Dashboard</a>
                    </li>

                    <li>
                        <a href="/about" class="">About</a>
                    </li>

                    <li>
                        <a href="/learn" class="">Learn</a>
                    </li>
                </ul>
            </nav>

            <div class="text-black w-2/12 flex justify-evenly">
                <?php if ($_SESSION['user'] ?? false) : ?>
                    <div class="dropdown-container">
                        <label class="dropdown dd-notif">
                            <div class="dd-button dd-notif-btn">
                                <?php if (! empty($notifications)):?>
                                    <img src="assets/images/icons/white-bell-filled.png" alt="notification">
                                <?php elseif (empty($notifications)):?>
                                    <img src="assets/images/icons/white-bell.png" alt="notification">
                                <?php endif;?>

                            </div>
                            <input type="checkbox" class="dd-input dropdown-toggle" id="notification-dropdown">
                            
                            <ul class="dd-menu">
                                <?php if (! empty($notifications)):?>
                                <?php foreach ($notifications as $notification): ?>
                                        <?php if($notification['notif_type'] === 'room_accept'): ?>
                                            <a href="/room?room_id=<?=$notification['room_id']?>">
                                                <li class="notif-li">
                                                    <span><?= $notification['sender_name'] ?> has accepted your join request to <?= $notification['room_name'] ?>.</span>
                                                </li>
                                            </a>
                                        <?php elseif($notification['notif_type'] === 'room_decline'):?>
                                            <a href="/dashboard">
                                                <li class="notif-li">
                                                    <span>Your request to join <?= $notification['room_name'] ?> has been declined.</span>
                                                </li>
                                            </a>
                                        <?php elseif($notification['notif_type'] === 'join_room'):?>
                                            <a href="/room?room_id=<?=$notification['room_id']?>">
                                                <li class="notif-li">
                                                    <span><?= $notification['sender_name'] ?> has requested to join <?= $notification['room_name'] ?>.</span>
                                                </li>
                                            </a>
                                        <?php elseif($notification['notif_type'] === 'prejoin'):?>
                                            <a href="/dashboard">
                                                <li class="notif-li">
                                                    <span>Requested to join <?= $notification['room_name'] ?>. Waiting for approval.</span>
                                                </li>
                                            </a>
                                        <?php elseif($notification['notif_type'] === 'group_create'):?>
                                            <a href="/room?room_id=<?=$notification['room_id']?>">
                                                <li class="notif-li">
                                            <span><?= $notification['sender_name'] ?> created a group in <?= $notification['room_name'] ?>.</span>
                                                </li>
                                            </a>
                                        <?php elseif($notification['notif_type'] === 'group_modify'):?>
                                            <a href="/room?room_id=<?=$notification['room_id']?>">
                                                <li class="notif-li">
                                                    <span><?= $notification['sender_name'] ?> modified the groups in <?= $notification['room_name'] ?>.</span>
                                                </li>
                                            </a>
                                        <?php elseif($notification['notif_type'] === 'account'):?>
                                            <a href="#">
                                                <li class="notif-li">
                                                    <span><?= $notification['sender_name'] ?> created a group in <?= $notification['room_name'] ?>.</span>
                                                </li>
                                            </a>
                                        <?php endif; ?>

                                        <li class="divider"></li>
                                <?php endforeach; ?>
                            <?php elseif(empty($notifications)): ?>
                                <li>
                                    <span class="no-notif-text">No notification for now.</span>
                                </li>
                            <?php endif; ?>
                            <?php if(! empty($notifications)): ?> 
                                <div class="clear-notif-container">
                                    <form action="/nav" method="post">
                                        <input type="hidden" name="uri" value="<?= $_SERVER['REQUEST_URI']?>">
                                        <button class="clear-notif-button" type="submit">Clear notifications</button>
                                    </form>
                                </div>
                            <?php endif; ?>
                            </ul>

                        </label>

                        <label class="dropdown dd-account">
                            <div class="dd-button dd-account-btn">
                                Account
                            </div>
                            <input type="checkbox" class="dd-input dropdown-toggle" id="account-dropdown">
                            
                            <ul class="dd-menu dd-menu-account">
                                <a href="/account">
                                    <li class="account-menu-li">
                                        <span class="account-menu-text">Account</span>
                                    </li>
                                </a>
                                <li class="divider"></li>
                                <li class="account-menu-li">
                                    <form method="POST" action="/login">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button class="account-btns logout-btn">Log Out</button>
                                    </form>
                                </li>
                            </ul>
                        </label>
                    </div>

                <?php else: ?>
                    <!-- TO-DO: Hover Image Effect -->
                    <a href="/login" class="login-container">
                        <span class="">Login</span>
                    </a>

                    <a href="/register" class="register-container">
                        <span class="">Sign Up</span>
                    </a>
                <?php endif; ?>
            </div> 
        </div>
    </header>
