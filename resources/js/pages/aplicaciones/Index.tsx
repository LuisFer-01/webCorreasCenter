import IndustryCard from '@/components/industrias/IndustryCard';
import Breadcrumbs from '@/components/layouts/globals/Breadcrumbs';
import GuestLayout from '@/layouts/GuestLayout';

interface ApplicationsIndexProps {
    industrias: Array<{
        id: number;
        nombre: string;
        slug: string;
        descripcion?: string;
        icono?: string;
        imagen?: string;
        subcategorias_count?: number;
        servicios_count?: number;
    }>;
}

export default function ApplicationsIndex({ industrias }: ApplicationsIndexProps) {
    const breadcrumbs = [{ label: 'Aplicaciones' }];

    return (
        <GuestLayout
            title="Aplicaciones por Industria - Correas Center"
            description="Soluciones especializadas para industria alimenticia, minera, agroindustrial, manufactura y más."
        >
            <section className="bg-gradient-to-br from-[#EA0A2A] to-[#9A0820] text-white py-16">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <Breadcrumbs items={breadcrumbs} className="mb-6 text-white/80" />
                    <h1 className="text-4xl sm:text-5xl font-bold mb-4">Aplicaciones por Industria</h1>
                    <p className="text-xl text-white/90 max-w-3xl">
                        Descubre cómo nuestros productos y servicios se adaptan a las necesidades específicas de cada sector industrial.
                    </p>
                </div>
            </section>

            <section className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {industrias.length > 0 ? (
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {industrias.map((industria) => (
                                <IndustryCard key={industria.id} industria={industria} />
                            ))}
                        </div>
                    ) : (
                        <div className="text-center py-20">
                            <p className="text-gray-500">No hay industrias disponibles.</p>
                        </div>
                    )}
                </div>
            </section>
        </GuestLayout>
    );
}
