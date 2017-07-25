<script src="{{ asset('js/backend.js') }}"></script>
<script src="{{ asset('js/backend-custom.js') }}"></script>
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>