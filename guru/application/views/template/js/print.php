<script type="text/javascript">
$('#print').click(function () {
        doc.fromHTML($('#printpdf').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save(type+'.pdf');
}); 
</script>