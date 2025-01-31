import DashboardLayout from '@/Layouts/DashboardLayout'
import React, { useState } from 'react'
import Header from '../../dashboard/components/Header'
import { Button, Container } from '@mui/material'
import ExcelUploader from '@/Components/modals/ExcelUploader'
import { Book, LaravelPaginationMeta, PageProps } from '@/types'
import { Edit2, Edit2Icon, EditIcon, SaveIcon, Trash2, X } from 'lucide-react'
import { DataGrid, GridActionsCellItem, GridColDef, GridPaginationModel, GridRenderCellParams, GridRowSelectionModel } from '@mui/x-data-grid'
import { Link, usePage } from '@inertiajs/react'
import { format, formatDate } from 'date-fns'
import axios from 'axios'
import { cn } from '@/lib/utlis'

function index({ books }: PageProps<{
    books: {
        data: Book[]
        meta: LaravelPaginationMeta
    }
}>) {
    const [excelopen, setexcelopen] = useState(false)
    const page = usePage();
    const [selectRows, setselectRows] = useState<GridRowSelectionModel>([]);
    const [loading, setloading] = React.useState(false)
    const [data, setdata] = React.useState(books.data)
    const [datatable, setdatatable] = React.useState<{
        selectRows: number[],
        page: number,
        perPage: number,
        sort: string,
        direction: string
    }>({
        selectRows: [],
        page: 0,
        perPage: 50,
        sort: 'id',
        direction: 'asc'
    })
    const columns: GridColDef[] = [
        {
            field: 'id',
            disableColumnMenu: true,
            headerName: 'SI No.',
            flex: 0.5,
            minWidth: 100,
            renderCell: (params) => <>{params.id}</>,
        },
        {
            field: 'is_active',
            disableColumnMenu: true,
            headerName: 'Status',
            flex: 0.5,
            minWidth: 100,
            renderCell: (params) => <span className={cn(Boolean(params.value) ? 'active-card' : "inactive-card")}>{Boolean(params.value) == true ? 'Active' : "Inactive"}</span>,
        },
        {
            field: 'eng_name',
            disableColumnMenu: true,
            headerName: 'English Name',
            flex: 0.5,
            minWidth: 100,
            renderCell: (params) => <>{params.value}</>,
        },
        {
            field: 'mal_name',
            headerName: 'Malayalam Name',
            flex: 0.5,
            minWidth: 100,
            renderCell: (params) => <span className='mal'>{params.value}</span>,
        },
        {
            field: 'max_chapters',
            headerName: 'Maximum Chapters',
            flex: 0.5,
            minWidth: 100,
        },
        {
            field: 'actions',
            type: 'actions',
            headerName: 'Actions',
            width: 100,
            cellClassName: 'actions',
            getActions: ({ id }) => {
                // const isInEditMode = data[id]?.mode === GridRowModes.Edit;
                const isInEditMode = false;
                if (isInEditMode) {
                    return [
                        <GridActionsCellItem
                            icon={<SaveIcon />}
                            label="Save"
                            sx={{
                                color: 'primary.main',
                            }}
                            onClick={() => console.log(id)}
                        />,
                        <GridActionsCellItem
                            icon={<X />}
                            label="Cancel"
                            className="textPrimary"
                            onClick={() => console.log(id)}
                            color="inherit"
                        />,
                    ];
                }

                return [
                    <Link href={`/companies/${id}`} target='_blank'>
                        <GridActionsCellItem
                            icon={<EditIcon />}
                            label="Edit"
                            className="textPrimary"
                            onClick={() => console.log(id)}
                            color="inherit"
                        />
                    </Link>,
                    <Link target='_self' method='post' onSuccess={() => {
                        setdatatable({ ...datatable });
                    }} onBefore={() => confirm('Do you want to delete?')} href={`/Books/${id}/delete`}>
                        <GridActionsCellItem
                            icon={<Trash2 />}
                            label="Delete"
                            onClick={() => console.log(id)}
                            color="inherit"
                        />
                    </Link>,
                ];
            },
        },
    ];
    const pgModel: GridPaginationModel = {
        pageSize: datatable.perPage,
        page: datatable.page
    }
    function renderDate(params: GridRenderCellParams) {
        return <div>
            {format(new Date(params.value), 'PP')}
        </div>
    }
    function renderAction(params: GridRenderCellParams) {
        return <div>
            <Edit2Icon />
        </div>
    }
    React.useEffect(() => {
        setloading(true)
        const fetchData = async () => {
            try {
                const response = await axios.post('/Books/Bible', datatable, {
                    headers: {
                        'Content-Type': 'application/json', // Specify the content type
                    }
                });
                console.log('Response:', response.data);
                setdata(response.data) // Response from the server
            } catch (error: any) {
                console.error('Error:', error.response?.data || error.message);
            }
            setloading(false)
            // const data = await response.json();
            // setRows(data.rows);
            // setRowCount(data.total);
        };
        fetchData();
    }, [datatable])
    return (
        <DashboardLayout title='Dashboard'>
            <ExcelUploader open={excelopen} setOpen={setexcelopen} />
            <Header title='Books' list={['Dashboard', 'Books', 'Bible Books']} />
            <Container maxWidth={'xl'} sx={{ padding: 0, margin: 0, maxWidth: '1700px' }}>
                {selectRows.length > 0 && <div className="flex gap-2 card shadow-none p-2">
                    <Link method='post' onSuccess={()=>setdatatable({...datatable})} data={datatable} href={`${page.url}/ActivateAll`} className='cardbtn greenbtn'>Activate All</Link>
                    <Link method='post' onSuccess={()=>setdatatable({...datatable})} data={datatable} href={`${page.url}/DeleteAll`} className='cardbtn redbtn'>Delete All</Link>
                </div>}
                <DataGrid
                    disableColumnMenu
                    onRowSelectionModelChange={(params) => {
                        setselectRows(params);
                        setdatatable({
                            ...datatable,
                            'selectRows': params as number[]
                        })
                    }}
                    checkboxSelection
                    loading={loading}
                    paginationModel={pgModel}
                    rowCount={books.meta.total}
                    paginationMode='server'
                    rowSelection={true}
                    sortingMode='server'
                    onSortModelChange={(model, details) => {
                        setdatatable({
                            ...datatable,
                            'sort': model[0].field,
                            'direction': model[0].sort ?? 'asc'
                        })
                    }}
                    onPaginationModelChange={(model) => {
                        setdatatable({
                            ...datatable,
                            'perPage': model.pageSize,
                            'page': model.page
                        })
                    }}
                    rows={data}
                    columns={columns}
                    getRowClassName={(params) =>
                        params.indexRelativeToCurrentPage % 2 === 0 ? 'even' : 'odd'
                    }
                    initialState={{
                        pagination: { paginationModel: { pageSize: 2 } },
                    }}
                    pageSizeOptions={[50, 100, 500]}
                    // disableColumnResize
                    density="standard"
                    slotProps={{
                        filterPanel: {
                            filterFormProps: {
                                logicOperatorInputProps: {
                                    variant: 'outlined',
                                    size: 'small',
                                },
                                columnInputProps: {
                                    variant: 'outlined',
                                    size: 'small',
                                    sx: { mt: 'auto' },
                                },
                                operatorInputProps: {
                                    variant: 'outlined',
                                    size: 'small',
                                    sx: { mt: 'auto' },
                                },
                                valueInputProps: {
                                    InputComponentProps: {
                                        variant: 'outlined',
                                        size: 'small',
                                    },
                                },
                            },
                        },
                    }}
                />

            </Container>
        </DashboardLayout>
    )
}

export default index