@push('css')
    <link id="pagestyle" href="{{ asset('asset/admin') }}/css/argon-dashboard.min.css?v=2.0.5" rel="stylesheet" />

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
@endpush



@push('js')
    
    <script src="{{ asset('asset/admin') }}/js/plugins/multistep-form.js"></script>
    <script src="{{ asset('asset/admin') }}/js/plugins/choices.min.js"></script>
    <script>
        if (document.getElementById('choices-gender')) {
          var gender = document.getElementById('choices-gender');
          const example = new Choices(gender);
          
        }
        if (document.getElementById('choices-role')) {
          var role = document.getElementById('choices-role');
          const example = new Choices(role);

        }
        if (document.getElementById('choices-group')) {
          var role = document.getElementById('choices-group');
          const example = new Choices(role);

        }
        if (document.getElementById('choices-manufacturer')) {
          var role = document.getElementById('choices-manufacturer');
          const example = new Choices(role);

        }
        if (document.getElementById('choices-type')) {
          var role = document.getElementById('choices-type');
          const example = new Choices(role);

        }
        function visible() {
            var elem = document.getElementById('profileVisibility');
            if (elem) {
                if (elem.innerHTML == "Activated") {
                elem.innerHTML = "UnActivated"
                } else {
                elem.innerHTML = "Activated"
                }
            }
        }
        //Format VNĐ price
        $('input[name^="price"]').on('input', function(e){        
            $(this).val(formatCurrency(this.value.replace(/[,VNĐ]/g,'')));
        }).on('keypress',function(e){
                if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
        }).on('paste', function(e){    
                var cb = e.originalEvent.clipboardData || window.clipboardData;      
                if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
        });
        function formatCurrency(number){
            var n = number.split('').reverse().join("");
            var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
            return  n2.split('').reverse().join('') + 'VNĐ';
        }
    </script>
@endpush


