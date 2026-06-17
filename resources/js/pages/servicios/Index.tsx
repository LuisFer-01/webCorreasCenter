import Breadcrumbs from '@/components/layouts/globals/Breadcrumbs';
import ServiceCard from '@/components/servicios/ServiceCard';
import GuestLayout from '@/layouts/GuestLayout';

interface ServicesIndexProps {
    servicios: Array<{
        id: number;
        nombre: string;
        slug: string;
        descripcion_corta?: string;
        descripcion?: string;
        imagen?: string;
        tiene_beneficios?: boolean;
        beneficios_count?: number;
    }>;
}

export default function ServicesIndex({ servicios }: ServicesIndexProps) {
    const breadcrumbs = [{ label: 'Servicios' }];

    return (
        <GuestLayout
            title="Servicios Industriales - Correas Center"
            description="Fabricación de sellos SKF, prensado de mangueras, reparación de cilindros y más servicios especializados."
        >
            <section className="bg-gradient-to-br from-[#EA0A2A] to-[#9A0820] text-white py-16">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <Breadcrumbs items={breadcrumbs} className="mb-6 text-white/80" />
                    <h1 className="text-4xl sm:text-5xl font-bold mb-4">Nuestros Servicios</h1>
                    <p className="text-xl text-white/90 max-w-3xl">
                        Soluciones integrales con soporte técnico experto para mantener tu operación en movimiento.
                    </p>
                </div>
            </section>

            <section className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {servicios.length > 0 ? (
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {servicios.map((servicio) => (
                                <ServiceCard key={servicio.id} servicio={servicio} />
                            ))}
                        </div>
                    ) : (
                        <div className="text-center py-20">
                            <p className="text-gray-500">No hay servicios disponibles actualmente.</p>
                        </div>
                    )}
                </div>
            </section>
        </GuestLayout>
    );
}
