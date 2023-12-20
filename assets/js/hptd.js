$(document).ready(function () {
    $(document).on('click', '.add', function () {
        const id = $(this).data('id')
        console.log(id)
        $('#ids').val(id)
    })

    $(document).on('click', '.edit', function () {
        const id = $(this).data('id')
        const phn = $(this).data('phn')

        $('#id').val(id)
        $('#phn').val(phn)
    })
})