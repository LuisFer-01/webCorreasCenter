import Footer from '@/components/layouts/globals/Footer';
import Navigation from '@/components/layouts/globals/Navigation';
import WhatsAppFloat from '@/components/layouts/globals/WhatsAppFloat';
import { Head } from '@inertiajs/react';
import { ReactNode } from 'react';

interface GuestLayoutProps {
    children: ReactNode;
    title?: string;
    description?: string;
}

export default function GuestLayout({
    children,
    title = 'Correas Center - Soluciones Industriales',
    description = 'Más de 25 años brindando repuestos, fabricación especializada y soporte técnico para la industria boliviana.'
}: GuestLayoutProps) {
    return (
        <>
            <Head>
                <title>{title}</title>
                <meta name="description" content={description} />
                <meta property="og:title" content={title} />
                <meta property="og:description" content={description} />
                <meta property="og:type" content="website" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
            </Head>

            <div className="min-h-screen flex flex-col bg-white">
                <Navigation />

                <main className="flex-grow pt-20">
                    {children}
                </main>

                <Footer />
                <WhatsAppFloat />
            </div>
        </>
    );
}
