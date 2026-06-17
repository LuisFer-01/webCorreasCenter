interface ProductConstructionProps {
    construccion: Record<string, string>;
}

export default function ProductConstruction({ construccion }: ProductConstructionProps) {
    if (!construccion || Object.keys(construccion).length === 0) {
        return null;
    }

    return (
        <div className="bg-white rounded-xl shadow-md p-6 border border-gray-100">
            <h3 className="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                <div className="w-1 h-8 bg-[#EA0A2A] rounded-full"></div>
                Composición y Construcción
            </h3>
            <div className="space-y-4">
                {Object.entries(construccion).map(([key, value]) => (
                    <div key={key} className="border-l-4 border-[#EA0A2A] pl-4 py-2 bg-gray-50 rounded-r-lg">
                        <p className="text-xs text-gray-500 uppercase font-semibold tracking-wider mb-1">
                            {key.replace(/_/g, ' ')}
                        </p>
                        <p className="text-gray-900 font-medium">{value}</p>
                    </div>
                ))}
            </div>
        </div>
    );
}
