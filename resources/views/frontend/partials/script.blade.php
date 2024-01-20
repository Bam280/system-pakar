<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function nextStep(step) {
        // Mengambil nilai checkbox
        var triggerFormChecked = document.getElementById('triggerForm').checked;

        // Menentukan langkah berikutnya berdasarkan nilai checkbox
        var nextStep = triggerFormChecked ? step : 3;

        // Sembunyikan langkah sebelumnya
        document.getElementById('step' + (step - 1)).style.display = 'none';

        // Tampilkan langkah berikutnya
        document.getElementById('step' + nextStep).style.display = 'block';
    }
    // var formData = {};

    // // Iterate over form elements and collect values
    // $('input.myInput').each(function() {
    //     var inputId = $(this).attr('id');
    //     var inputValue = $(this).val();
    //     var inputName = $(this).attr('name');

    //     // Skip buttons and other non-input elements
    //     if (inputId && inputValue !== undefined) {
    //         // Initialize the array if it doesn't exist
    //         formData[inputName] = formData[inputName] || [];
    //         formData[inputName].push(inputValue);
    //     }
    // });

    // // You now have all the form values in the 'formData' object
    // console.log(formData);

    $('#formDiagnosenilai').submit(function(e) {
        nextStep(4)
        e.preventDefault();
        console.log('ok')
        console.log(this)

        var formData = new FormData(e.target);

        console.log(formData);

        $.ajax({
            type: "POST",
            url: "{{ route('nilai.store') }}",
            data: formData,
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting the content type
            success: function(data) {
                console.log("Server response:", data);
                // You can handle the server response here
                $('#hasilrumus').html(data['maxKey'])

            },
            error: function(error) {
                console.error("Error:", error);
                // Handle errors here
            }
        });

    });
</script>
