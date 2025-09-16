import Checkbox from '@/Components/Checkbox';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('login'), {
            onFinish: () => reset('password'),
        });
    };

    return (
        <GuestLayout>
            <Head title="Log in" />

            {status && (
                <div className="mb-4 text-sm font-medium text-green-600">
                    {status}
                </div>
            )}

            <form onSubmit={submit}>
                <div className='px-6 py-9'>
                    <div>
                        <h1 className='text-3xl text-center uppercase font-bold font-sans text-text-primaryLight dark:text-text-primaryDark mb-9'>Login</h1>
                        <InputLabel htmlFor="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            name="email"
                            value={data.email}
                            className="mt-1 block w-full"
                            autoComplete="username"
                            isFocused={true}
                            onChange={(e) => setData('email', e.target.value)}
                        />

                        <InputError message={errors.email} className="mt-2" />
                    </div>

                    <div className="mt-4">
                        <InputLabel htmlFor="password" value="Password" />

                        <TextInput
                            id="password"
                            type="password"
                            name="password"
                            value={data.password}
                            className="mt-1 block w-full"
                            autoComplete="current-password"
                            onChange={(e) => setData('password', e.target.value)}
                        />

                        <InputError message={errors.password} className="mt-2" />
                    </div>

                    <div className="mt-4 flex justify-between">
                        <label className="flex items-center">
                            <Checkbox
                                name="remember"
                                checked={data.remember}
                                onChange={(e) =>
                                    setData('remember', e.target.checked)
                                }
                            />
                            <span className="ms-2 text-sm text-text-secondaryLight dark:text-text-secondaryDark">
                                Remember me
                            </span>
                        </label>
                        {canResetPassword && (
                            <Link
                                href={route('password.request')}
                                className="rounded-md text-sm text-text-primaryLight dark:text-text-primaryDark underline hover:text-primary-hover dark:hover:text-primary-hover focus:outline-none focus:ring-offset-2 duration-150"
                            >
                                Forgot your password?
                            </Link>
                        )}
                    </div>

                    <div className="mt-4 flex items-center">
                        <PrimaryButton className="justify-center w-full duration-150" disabled={processing}>
                            Log in
                        </PrimaryButton>
                    </div>
                    <div className='text-center border-t-2 border-primary-borderLight dark:border-primary-borderDark mt-6 pt-6 text-text-primaryLight dark:text-text-primaryDark text-sm'>
                        dont have account ? <Link href={route("register")}> <span className='underline text-primary hover:text-primary-light'>Register Here</span></Link>
                    </div>
                </div>
            </form>
        </GuestLayout >
    );
}
