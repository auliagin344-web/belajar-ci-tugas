<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- HOME -->
        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == '' ? '' : 'collapsed') ?>" href="<?= base_url('/') ?>">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>

        <!-- KERANJANG -->
        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'keranjang' ? '' : 'collapsed') ?>" href="<?= base_url('keranjang') ?>">
                <i class="bi bi-cart-check"></i>
                <span>Keranjang</span>
            </a>
        </li>

        <?php if (session()->get('isLoggedIn')) : ?>

            <!-- ================= ADMIN ================= -->
            <?php if (session()->get('role') == 'admin') : ?>

                <!-- Produk -->
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'produk' ? '' : 'collapsed') ?>"
                        href="<?= base_url('produk') ?>">
                        <i class="bi bi-box-seam"></i>
                        <span>Produk</span>
                    </a>
                </li>

                <!-- Diskon -->
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'diskon' ? '' : 'collapsed') ?>"
                        href="<?= base_url('diskon') ?>">
                        <i class="bi bi-percent"></i>
                        <span>Diskon</span>
                    </a>
                </li>

                <!-- Pembelian -->
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'pembelian' ? '' : 'collapsed') ?>"
                        href="<?= base_url('pembelian') ?>">
                        <i class="bi bi-bag-check"></i>
                        <span>Pembelian</span>
                    </a>
                </li>

            <?php endif; ?>

            <!-- ================= SEMUA USER ================= -->

            <!-- History -->
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'history' ? '' : 'collapsed') ?>"
                    href="<?= base_url('history') ?>">
                    <i class="bi bi-clock-history"></i>
                    <span>History</span>
                </a>
            </li>

            <!-- Profile -->
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'profile' ? '' : 'collapsed') ?>"
                    href="<?= base_url('profile') ?>">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>

            <!-- FAQ -->
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'faq' ? '' : 'collapsed') ?>"
                    href="<?= base_url('faq') ?>">
                    <i class="bi bi-question-circle"></i>
                    <span>F.A.Q</span>
                </a>
            </li>

            <!-- Contact -->
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'contact' ? '' : 'collapsed') ?>"
                    href="<?= base_url('contact') ?>">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li>

        <?php endif; ?>

    </ul>

</aside>