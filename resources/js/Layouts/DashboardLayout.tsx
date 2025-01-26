import { PropsWithChildren, ReactNode } from "react";
import type { } from '@mui/x-date-pickers/themeAugmentation';
import type { } from '@mui/x-charts/themeAugmentation';
import type { } from '@mui/x-data-grid/themeAugmentation';
import { alpha } from '@mui/material/styles';
import CssBaseline from '@mui/material/CssBaseline';
import Box from '@mui/material/Box';
import Stack from '@mui/material/Stack';
import AppTheme from '@/Pages/shared-theme/AppTheme';

import { Typography } from '@mui/material';
import SideMenu from "@/Pages/Admin/dashboard/components/SideMenu";
import AppNavbar from "@/Pages/Admin/dashboard/components/AppNavbar";
import { usePage } from "@inertiajs/react";

export default function DashboardLayout({
    header,
    children,
    title
}: PropsWithChildren<{ header?: ReactNode, title: string }>) {
    const user = usePage().props.auth.user;
    return <AppTheme>
        <Box sx={{ display: 'flex' }}>
            <CssBaseline />
            <SideMenu user={user} />
            <AppNavbar title={title} user={user} />
            {/* Main content */}
            <Box
                component="main"
                sx={() => ({
                    flexGrow: 1,
                    overflow: 'auto',
                })}
            >
                <Stack
                    spacing={2}
                    sx={{
                        alignItems: 'center',
                        mx: 3,
                        pb: 5,
                        mt: { xs: 8, md: 0 },
                    }}
                >
                    {children}
                </Stack>
            </Box>
        </Box>


    </AppTheme>
}
