import { forwardRef, useEffect, useImperativeHandle, useRef } from 'react';

export default forwardRef(function TextInput(
    { type = 'text', className = '', isFocused = false, ...props },
    ref,
) {
    const localRef = useRef(null);

    useImperativeHandle(ref, () => ({
        focus: () => localRef.current?.focus(),
    }));

    useEffect(() => {
        if (isFocused) {
            localRef.current?.focus();
        }
    }, [isFocused]);

    return (
        <input
            {...props}
            type={type}
            className={
                'dark:bg-background-dark dark:text-text-primaryDark rounded-md border-input-borderLight hover:border-input-borderHoverLight dark:border-input-borderDark dark:hover:border-input-borderHoverLight shadow-sm  focus:ring-input-placeholderLight dark:focus:ring-input-placeholderDark ' +
                className
            }
            ref={localRef}
        />
    );
});
