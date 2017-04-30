<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/backend.js') }}"></script>
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>