<?php
$session = \Config\Services::session();
$user_type = $session->get('user_type');
$is_admin = $session->get('is_admin') ?? 0;
?>




<?php
if ($is_admin == 1 && $user_type != 'hod') {
?>

    <nav>
        <div class="left-nav">
            <ul class="nav-links">
                <a href="<?= site_url('admin_dashboard') ?>">
                    <button class="nav_button">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span> Dashboard
                    </button>
                </a>
            </ul>
        </div>

        <div class="right-nav">
            <a href="<?= site_url('profile') ?>">
                <button class="nav_button">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span> Profile
                </button>
            </a>
            <a href="<?= site_url('logout') ?>">
                <button class="nav_button">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span> Logout
                </button>
            </a>
        </div>
    </nav>
<?php
} elseif ($user_type == 'hod' || $user_type == 'teacher') {
?>
    <nav>
        <div class="left-nav">
            <ul class="nav-links">
                <?php if ($user_type == 'teacher') : ?>
                    <a href="<?= site_url('dashboard') ?>">
                        <button class="nav_button">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span> Dashboard
                        </button>
                    </a>
                <?php endif; ?>

                <a href="<?= site_url('view_results') ?>">
                    <button class="nav_button">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span> View Results
                    </button>
                </a>

                <?php if ($user_type == 'hod') : ?>
                    <a href="<?= site_url('department_approval_list') ?>">
                        <button class="nav_button">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span> Pending Approval
                        </button>
                    </a>
                    <a href="<?= site_url('progress') ?>">
                        <button class="nav_button">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span> Progress
                        </button>
                    </a>
                <?php endif; ?>
            </ul>
        </div>

        <div class="right-nav">
            <a href="<?= site_url('profile') ?>">
                <button class="nav_button">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span> Profile
                </button>
            </a>
            <a href="<?= site_url('logout') ?>">
                <button class="nav_button">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span> Logout
                </button>
            </a>
        </div>
    </nav>
<?php
} else {
?>
    <nav>
        <div class="left-nav">
            <ul class="nav-links">
                <a href="<?= site_url() ?>">
                    <button class="nav_button">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span> Home
                    </button>
                </a>
            </ul>
        </div>
        <div class="right-nav">
            <a href="<?= site_url('register') ?>">
                <button class="nav_button">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span> Register
                </button>
            </a>
            <a href="<?= site_url('login') ?>">
                <button class="nav_button">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span> Login
                </button>
            </a>
        </div>
    </nav>
<?php
}
?>