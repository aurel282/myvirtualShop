<script>
    @if (count($errors) > 0)
        let errors = {!! $errors !!} ;

        for(let key in errors)
        {
            let name = convertToInputName(key);
            let field = $('[name="' + name + '"]');
            let errorsMessages = errors[key];

            addFieldError(field, errorsMessages);
        }

        function addFieldError(field, message)
        {
            field
                .closest('.field')
                .append('<div class="ui basic red pointing prompt label error-message">'+ message +'</div>')
                .closest('form')
                .addBack()
                .addClass('error');
        }

        function clearFieldError(field)
        {
            field
                .closest('.field')
                .removeClass('error')
                .children('.error-message')
                .remove();
        }

        function convertToInputName(key)
        {
            let array = key.split('.');

            if( array.length <= 1 )
            {
                return key;
            }

            let first = array.shift();

            return first + '[' + array.join('][') + ']';
        }
    @endif
</script>
