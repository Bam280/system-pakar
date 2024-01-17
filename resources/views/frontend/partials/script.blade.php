<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function nextStep(step) {

        // Sembunyikan langkah sebelumnya
        document.getElementById('step' + (step - 1)).style.display = 'none';

        // Tampilkan langkah berikutnya
        document.getElementById('step' + step).style.display = 'block';


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
            },
            error: function(error) {
                console.error("Error:", error);
                // Handle errors here
            }
        });

    });


    // let data = {};

    // // Iterate over formData entries
    // for (var entry of formData.entries()) {
    //     var fieldName = entry[0];
    //     var fieldValue = entry[1];
    //     data[fieldName] = fieldValue;
    // }

    // console.log(data);
</script>
{{-- <script>
    // <<untuk Form pakai radio button>> 
    function submitForm() {
        for (let i = 1; i <= 3; i++) {
            var inputType = document.querySelector(`input[name="inputType${i}"]:checked`).value;
            var value;

            if (inputType === 'text') {
                value = document.getElementById(`textValue${i}`).value;
            } else {
                value = document.getElementById(`selectValue${i}`).value;
            }

            // Lakukan sesuatu dengan nilai yang dipilih
            console.log(`Nilai yang Dipilih untuk Isian ${i}:`, value);
        }
    }

    // Tambahkan event listener untuk mengubah tampilan input berdasarkan pilihan radio button
    for (let i = 1; i <= 3; i++) {
        document.querySelectorAll(`input[name="inputType${i}"]`).forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (this.value === 'text') {
                    document.getElementById(`textInput${i}`).style.display = 'block';
                    document.getElementById(`selectInput${i}`).style.display = 'none';
                } else {
                    document.getElementById(`textInput${i}`).style.display = 'none';
                    document.getElementById(`selectInput${i}`).style.display = 'block';
                }
            });
        });
    }
</script> --}}



{{-- <script>
    $(document).ready(function() {
        $('#myInput').on('input', function() {
            const query = $(this).val();

            $.ajax({
                url: '/diagnose', // Replace with your Laravel route for fetching suggestions
                method: 'GET',
                data: {
                    query: query
                },
                success: function(data) {
                    const ul = $('#myUL');
                    ul.empty();

                    // Check if data is an array before iterating
                    if (Array.isArray(data)) {
                        $.each(data, function(key, value) {
                            ul.append('<li>' + value.title + '</li>');
                        });
                    } else {
                        console.error('Invalid data format:', data);
                    }

                    // Add click event listener to set the input value when a suggestion is clicked
                    ul.find('li').on('click', function() {
                        $('#myInput').val($(this).text());
                        ul.empty(); // Clear the list after selection
                    });
                },
                error: function(error) {
                    console.error('Error fetching suggestions:', error);
                }
            });
        });
    });
</script> --}}


{{-- <script>
    $(document).ready(function() {
        $('#myInput').on('input', function() {
            const query = $(this).val();

            $.ajax({
                url: '/diagnose',
                method: 'GET',
                data: {
                    query: query
                },
                success: function(data) {
                    const ul = $('#myUL');
                    ul.empty();

                    // Check if data is an array before iterating
                    if (Array.isArray(data)) {
                        $.each(data, function(key, value) {
                            ul.append('<li>' + value.title + '</li>');
                        });
                    } else {
                        console.error('Invalid data format:', data);
                    }

                    // Add click event listener to set the input value when a suggestion is clicked
                    ul.find('li').on('click', function() {
                        $('#myInput').val($(this).text());
                        ul.empty(); // Clear the list after selection
                    });
                }
            });
        });
    });
</script> --}}
