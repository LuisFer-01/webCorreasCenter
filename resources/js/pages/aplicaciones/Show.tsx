import Breadcrumbs from '@/components/layouts/globals/Breadcrumbs';
import ServiceCard from '@/components/servicios/ServiceCard';
import SubcategoryCard from '@/components/subcategorias/SubcategoryCard';
import GuestLayout from '@/layouts/GuestLayout';

interface ApplicationShowProps {
    industria: {
        id: number;
        nombre: string;
        slug: string;
        descripcion?: string;
        icono?: string;
        imagen?: string;
    };
    subcategoriasRelacionadas: Array<{
        id: number;
        nombre: string;
        slug: string;
        descripcion_corta?: string;
        imagen?: string;
        categoria?: { nombre: string; slug: string };
    }>;
    serviciosRelacionados: Array<{
        id: number;
        nombre: string;
        slug: string;
        descripcion_corta?: string;
        imagen?: string;
    }>;
    otrasIndustrias?: Array<{ nombre: string; slug: string; icono?: string }>;
}

export default function ApplicationShow({
    industria,
    subcategoriasRelacionadas,
    serviciosRelacionados,
    otrasIndustrias = [],
}: ApplicationShowProps) {
    const breadcrumbs = [
        { label: 'Aplicaciones', href: '/aplicaciones' },
        { label: industria.nombre },
    ];

    return (
        <GuestLayout
            title={`${industria.nombre} - Correas Center`}
            description={industria.descripcion}
        >
            <section className="relative bg-gradient-to-br from-[#EA0A2A] to-[#9A0820] text-white py-20 overflow-hidden">
                {industria.imagen && (
                    <div className="absolute inset-0">
                        <img src={industria.imagen} alt="" className="w-full h-full object-cover opacity-20" />
                        <div className="absolute inset-0 bg-gradient-to-r from-[#EA0A2A]/95 to-[#EA0A2A]/70"></div>
                    </div>
                )}
                <div className="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <Breadcrumbs items={breadcrumbs} className="mb-6 text-white/80" />
                    <div className="flex items-center gap-4 mb-4">
                        {industria.icono && (
                            <img src={industria.icono} alt="" className="w-16 h-16 bg-white/10 rounded-lg p-2" />
                        )}
                        <h1 className="text-4xl sm:text-5xl font-bold">{industria.nombre}</h1>
                    </div>
                    {industria.descripcion && (
                        <p className="text-xl text-white/90 max-w-3xl leading-relaxed">
                            {industria.descripcion}
                        </p>
                    )}
                </div>
            </section>

            {/* Subcategorías relacionadas */}
            {subcategoriasRelacionadas.length > 0 && (
                <section className="py-16 bg-gray-50">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h2 className="text-3xl font-bold text-gray-900 mb-2">Productos recomendados</h2>
                        <p className="text-gray-600 mb-8">
                            Subcategorías ideales para {industria.nombre.toLowerCase()}
                        </p>
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            {subcategoriasRelacionadas.map((sub) => (
                                <SubcategoryCard key={sub.id} subcategoria={sub} />
                            ))}
                        </div>
                    </div>
                </section>
            )}

            {/* Servicios relacionados */}
            {serviciosRelacionados.length > 0 && (
                <section className="py-16 bg-white">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h2 className="text-3xl font-bold text-gray-900 mb-2">Servicios especializados</h2>
                        <p className="text-gray-600 mb-8">
                            Servicios que complementan tu operación en {industria.nombre.toLowerCase()}
                        </p>
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {serviciosRelacionados.map((servicio) => (
                                <ServiceCard key={servicio.id} servicio={servicio} />
                            ))}
                        </div>
                    </div>
                </section>
            )}

            {/* Otras industrias */}
            {otrasIndustrias.length > 0 && (
                <section className="py-16 bg-gray-50">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h2 className="text-3xl font-bold text-gray-900 mb-8">Otras industrias</h2>
                        <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
                            {otrasIndustrias.map((ind) => (
                                <a
                                    key={ind.slug}
                                    href={`/aplicacion/${ind.slug}`}
                                    className="bg-white hover:bg-[#EA0A2A] hover:text-white text-gray-900 px-6 py-4 rounded-lg transition-all text-center font-semibold shadow-sm hover:shadow-md"
                                >
                                    {ind.nombre}
                                </a>
                            ))}
                        </div>
                    </div>
                </section>
            )}
        </GuestLayout>
    );
}
