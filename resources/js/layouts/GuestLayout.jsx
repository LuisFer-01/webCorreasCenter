import Footer from '@/components/layouts/globals/Footer';
import Navigation from '@/components/layouts/globals/Navigation';
import WhatsAppFloat from '@/components/layouts/globals/WhatsAppFloat';
import { Head } from '@inertiajs/react';

export default function GuestLayout({ children, title, description }) {
    return (
        <>
            <Head>
                <title>{title || 'Correas Center - Soluciones Industriales'}</title>
                <meta name="description" content={description || 'Más de 25 años brindando repuestos, fabricación especializada y soporte técnico para la industria boliviana.'} />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
            </Head>

            <div className="min-h-screen flex flex-col bg-white">
                <Navigation />

                <main className="flex-grow">
                    {children}
                </main>

                <Footer />
                <WhatsAppFloat />
            </div>
        </>
    );
}
