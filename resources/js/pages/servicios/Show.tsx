
import Breadcrumbs from '@/components/layouts/globals/Breadcrumbs';
import ServiceCard from '@/components/servicios/ServiceCard';
import GuestLayout from '@/layouts/GuestLayout';
import { CheckCircle } from 'lucide-react';

interface ServiceShowProps {
    servicio: {
        id: number;
        nombre: string;
        slug: string;
        descripcion?: string;
        imagen?: string;
        galeria?: string[];
        beneficios?: string[];
        tiene_galeria?: boolean;
        tiene_beneficios?: boolean;
    };
    otrosServicios?: Array<{
        nombre: string;
        slug: string;
        descripcion_corta?: string;
        imagen?: string;
    }>;
}

export default function ServiceShow({ servicio, otrosServicios = [] }: ServiceShowProps) {
    const breadcrumbs = [
        { label: 'Servicios', href: '/servicios' },
        { label: servicio.nombre },
    ];

    const whatsappMessage = `Hola, me interesa el servicio de ${servicio.nombre}.`;
    const whatsappUrl = `https://wa.me/59177306576?text=${encodeURIComponent(whatsappMessage)}`;

    return (
        <GuestLayout
            title={`${servicio.nombre} - Correas Center`}
            description={servicio.descripcion}
        >
            <section className="relative bg-gradient-to-br from-[#EA0A2A] to-[#9A0820] text-white py-20 overflow-hidden">
                {servicio.imagen && (
                    <div className="absolute inset-0">
                        <img src={servicio.imagen} alt="" className="w-full h-full object-cover opacity-20" />
                        <div className="absolute inset-0 bg-gradient-to-r from-[#EA0A2A]/95 to-[#EA0A2A]/70"></div>
                    </div>
                )}
                <div className="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <Breadcrumbs items={breadcrumbs} className="mb-6 text-white/80" />
                    <h1 className="text-4xl sm:text-5xl font-bold mb-4">{servicio.nombre}</h1>
                </div>
            </section>

            <section className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        {/* Descripción */}
                        <div className="lg:col-span-2 space-y-8">
                            <div className="bg-white rounded-xl shadow-md p-8 border border-gray-100">
                                <h2 className="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                                    <div className="w-1 h-8 bg-[#EA0A2A] rounded-full"></div>
                                    Descripción del Servicio
                                </h2>
                                <p className="text-gray-700 leading-relaxed whitespace-pre-line">
                                    {servicio.descripcion}
                                </p>
                            </div>

                            {/* Galería */}
                            {servicio.tiene_galeria && servicio.galeria && servicio.galeria.length > 0 && (
                                <div className="bg-white rounded-xl shadow-md p-8 border border-gray-100">
                                    <h2 className="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                        <div className="w-1 h-8 bg-[#EA0A2A] rounded-full"></div>
                                        Galería
                                    </h2>
                                    <div className="grid grid-cols-2 md:grid-cols-3 gap-4">
                                        {servicio.galeria.map((img, idx) => (
                                            <div key={idx} className="aspect-square bg-gray-100 rounded-lg overflow-hidden">
                                                <img src={img} alt={`${servicio.nombre} ${idx + 1}`} className="w-full h-full object-cover hover:scale-110 transition-transform duration-500" />
                                            </div>
                                        ))}
                                    </div>
                                </div>
                            )}
                        </div>

                        {/* Sidebar Beneficios */}
                        <aside className="space-y-6">
                            {servicio.tiene_beneficios && servicio.beneficios && (
                                <div className="bg-white rounded-xl shadow-md p-6 border border-gray-100 sticky top-24">
                                    <h3 className="text-xl font-bold text-gray-900 mb-4">Beneficios</h3>
                                    <ul className="space-y-3">
                                        {servicio.beneficios.map((beneficio, idx) => (
                                            <li key={idx} className="flex items-start gap-2">
                                                <CheckCircle size={18} className="text-[#EA0A2A] flex-shrink-0 mt-0.5" />
                                                <span className="text-gray-700 text-sm">{beneficio}</span>
                                            </li>
                                        ))}
                                    </ul>
                                    <a
                                        href={whatsappUrl}
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        className="mt-6 w-full inline-flex items-center justify-center gap-2 bg-[#EA0A2A] text-white px-6 py-3 rounded-md hover:bg-[#C10923] transition-all font-semibold"
                                    >
                                        Solicitar Servicio
                                    </a>
                                </div>
                            )}
                        </aside>
                    </div>
                </div>
            </section>

            {otrosServicios.length > 0 && (
                <section className="py-16 bg-white">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h2 className="text-3xl font-bold text-gray-900 mb-8">Otros Servicios</h2>
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                            {otrosServicios.map((s) => (
                                <ServiceCard key={s.slug} servicio={s} />
                            ))}
                        </div>
                    </div>
                </section>
            )}
        </GuestLayout>
    );
}
