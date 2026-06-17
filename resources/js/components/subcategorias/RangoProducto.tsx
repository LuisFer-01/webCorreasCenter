import { useState } from 'react';

interface ProductRangeProps {
    gama_productos: Record<string, any>;
}

export default function ProductRange({ gama_productos }: ProductRangeProps) {
    const [activeTab, setActiveTab] = useState<string | null>(
        Object.keys(gama_productos || {})[0] || null
    );

    if (!gama_productos || Object.keys(gama_productos).length === 0) {
        return null;
    }

    const activeProduct = activeTab ? gama_productos[activeTab] : null;

    return (
        <div className="bg-white rounded-xl shadow-md p-6 border border-gray-100">
            <h3 className="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                <div className="w-1 h-8 bg-[#EA0A2A] rounded-full"></div>
                Gama de Productos
            </h3>

            {/* Tabs */}
            <div className="flex flex-wrap gap-2 mb-6 border-b border-gray-200 pb-4">
                {Object.keys(gama_productos).map((key) => (
                    <button
                        key={key}
                        onClick={() => setActiveTab(key)}
                        className={`px-4 py-2 rounded-md font-semibold text-sm transition-all ${
                            activeTab === key
                                ? 'bg-[#EA0A2A] text-white shadow-md'
                                : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                        }`}
                    >
                        {gama_productos[key].nombre}
                    </button>
                ))}
            </div>

            {/* Contenido del tab activo */}
            {activeProduct && (
                <div className="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                    <div className="bg-gray-50 rounded-lg p-4 aspect-video flex items-center justify-center">
                        {activeProduct.imagen ? (
                            <img
                                src={activeProduct.imagen}
                                alt={activeProduct.nombre}
                                className="max-w-full max-h-full object-contain"
                            />
                        ) : (
                            <span className="text-gray-400 text-6xl font-bold opacity-20">
                                {activeProduct.nombre.charAt(0)}
                            </span>
                        )}
                    </div>
                    <div>
                        <h4 className="text-xl font-bold text-gray-900 mb-2">
                            {activeProduct.nombre}
                        </h4>
                        {activeProduct.descripcion && (
                            <p className="text-gray-600">{activeProduct.descripcion}</p>
                        )}
                    </div>
                </div>
            )}
        </div>
    );
}
