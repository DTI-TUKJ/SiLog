<?php echo $this->extend('partials/header_layout' ) ?>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<?= $this->section('footer') ?>
 <div class="nk-footer bg-white">
                <div class="container-fluid">
                    <div class="nk-footer-wrap">
                        <div class="nk-footer-copyright"> &copy; 2023 SiLog. Template by <a href="https://softnio.com" target="_blank">DTI</a>
                        </div>
                    
                    </div>
                </div>
            </div>
  <!-- JavaScript -->
    <script src="<?php echo base_url('') ?>/assets/js/bundle.js?ver=3.2.0"></script>
    <script src="<?php echo base_url('') ?>/assets/js/scripts.js?ver=3.2.0"></script>
    <script src="<?php echo base_url('') ?>/assets/js/charts/gd-invest.js?ver=3.2.0"></script>

<?= $this->endSection() ?>