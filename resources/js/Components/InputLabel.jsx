export default function InputLabel({
    value,
    className = '',
    children,
    ...props
}) {
    return (
        <label
            {...props}
            className={
                `block text-sm font-medium text-text-primaryLight dark:text-text-primaryDark ` +
                className
            }
        >
            {value ? value : children}
        </label>
    );
}
