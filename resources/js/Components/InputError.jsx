export default function InputError({ message, className = '', ...props }) {
    return message ? (
        <p
            {...props}
            className={'text-sm text-text-eror ' + className}
        >
            {message}
        </p>
    ) : null;
}
