<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client;

class MinTradeLimits
{
    private const ZRX_LIMIT    = '25';
    private const INCH1_LIMIT  = '10';
    private const AAVE_LIMIT   = '0.15';
    private const GHST_LIMIT   = '5';
    private const ACA_LIMIT    = '50';
    private const AGLD_LIMIT   = '20';
    private const AKT_LIMIT    = '20';
    private const ALCX_LIMIT   = '0.3';
    private const ACH_LIMIT    = '500';
    private const ALGO_LIMIT   = '20';
    private const TLM_LIMIT    = '350';
    private const ALPHA_LIMIT  = '50';
    private const AIR_LIMIT    = '700';
    private const ADX_LIMIT    = '40';
    private const FORTH_LIMIT  = '1.5';
    private const ANKR_LIMIT   = '200';
    private const APE_LIMIT    = '2';
    private const API3_LIMIT   = '3.5';
    private const APT_LIMIT    = '1.25';
    private const ANT_LIMIT    = '2.5';
    private const ARPA_LIMIT   = '200';
    private const ASTR_LIMIT   = '125';
    private const AUDIO_LIMIT  = '30';
    private const REP_LIMIT    = '1.5';
    private const REPV2_LIMIT  = '1';
    private const AVAX_LIMIT   = '0.4';
    private const AXS_LIMIT    = '0.65';
    private const BADGER_LIMIT = '2';
    private const BAL_LIMIT    = '1';
    private const BNT_LIMIT    = '15';
    private const BAND_LIMIT   = '3';
    private const BOND_LIMIT   = '1.5';
    private const BAT_LIMIT    = '20';
    private const BSX_LIMIT    = '60,000';
    private const BICO_LIMIT   = '17.5';
    private const BNC_LIMIT    = '50';
    private const BTC_LIMIT    = '0.0001';
    private const BCH_LIMIT    = '0.05';
    private const BIT_LIMIT    = '17.5';
    private const BTT_LIMIT    = '7,500,000';
    private const BLZ_LIMIT    = '85';
    private const BOBA_LIMIT   = '25';
    private const FIDA_LIMIT   = '10';
    private const ADA_LIMIT    = '15';
    private const CTSI_LIMIT   = '50';
    private const CELR_LIMIT   = '500';
    private const CFG_LIMIT    = '25';
    private const XCN_LIMIT    = '100';
    private const LINK_LIMIT   = '0.8';
    private const CHZ_LIMIT    = '25';
    private const CHR_LIMIT    = '40';
    private const CVC_LIMIT    = '50';
    private const COMP_LIMIT   = '0.2';
    private const C98_LIMIT    = '20';
    private const CVX_LIMIT    = '1.2';
    private const ATOM_LIMIT   = '0.5';
    private const COTI_LIMIT   = '65';
    private const CQT_LIMIT    = '50';
    private const CSM_LIMIT    = '1,250';
    private const CRV_LIMIT    = '10';
    private const DAI_LIMIT    = '5';
    private const DASH_LIMIT   = '0.13';
    private const MANA_LIMIT   = '12.5';
    private const DENT_LIMIT   = '7,000';
    private const DOGE_LIMIT   = '60';
    private const DYDX_LIMIT   = '2.5';
    private const EGLD_LIMIT   = '0.15';
    private const EWT_LIMIT    = '1.25';
    private const ENJ_LIMIT    = '15';
    private const MLN_LIMIT    = '0.25';
    private const EOS_LIMIT    = '5';
    private const ETHW_LIMIT   = '1.5';
    private const ETH_LIMIT    = '0.01';
    private const ETC_LIMIT    = '0.25';
    private const ENS_LIMIT    = '0.4';
    private const EUL_LIMIT    = '1';
    private const FTM_LIMIT    = '25';
    private const FET_LIMIT    = '75';
    private const FIL_LIMIT    = '1.25';
    private const FLR_LIMIT    = '5';
    private const FLOW_LIMIT   = '5';
    private const FXS_LIMIT    = '1';
    private const GALA_LIMIT   = '200';
    private const GAL_LIMIT    = '2.5';
    private const GARI_LIMIT   = '150';
    private const MV_LIMIT     = '25';
    private const GTC_LIMIT    = '3';
    private const GNO_LIMIT    = '0.06';
    private const GST_LIMIT    = '200';
    private const FARM_LIMIT   = '0.15';
    private const HFT_LIMIT    = '8.5';
    private const ICX_LIMIT    = '30';
    private const IDEX_LIMIT   = '100';
    private const RLC_LIMIT    = '6.5';
    private const IMX_LIMIT    = '12';
    private const INJ_LIMIT    = '3';
    private const TEER_LIMIT   = '15';
    private const INTR_LIMIT   = '250';
    private const ICP_LIMIT    = '1.5';
    private const JASMY_LIMIT  = '1,250';
    private const JUNO_LIMIT   = '2.5';
    private const KAR_LIMIT    = '22.5';
    private const KAVA_LIMIT   = '5';
    private const ROOK_LIMIT   = '0.35';
    private const KEEP_LIMIT   = '75';
    private const KP3R_LIMIT   = '0.065';
    private const KILT_LIMIT   = '12';
    private const KIN_LIMIT    = '500,000';
    private const KINT_LIMIT   = '6.5';
    private const KSM_LIMIT    = '0.2';
    private const KNC_LIMIT    = '10';
    private const LDO_LIMIT    = '5';
    private const LCX_LIMIT    = '125';
    private const LSK_LIMIT    = '7.5';
    private const LTC_LIMIT    = '0.06';
    private const LPT_LIMIT    = '0.65';
    private const LRC_LIMIT    = '20';
    private const MKR_LIMIT    = '0.0075';
    private const MNGO_LIMIT   = '250';
    private const MSOL_LIMIT   = '0.35';
    private const POND_LIMIT   = '600';
    private const MASK_LIMIT   = '2';
    private const MC_LIMIT     = '12';
    private const MINA_LIMIT   = '10';
    private const MIR_LIMIT    = '35';
    private const XMR_LIMIT    = '0.05';
    private const GLMR_LIMIT   = '15';
    private const MOVR_LIMIT   = '0.65';
    private const MULTI_LIMIT  = '1.5';
    private const MXC_LIMIT    = '150';
    private const ALICE_LIMIT  = '5';
    private const NANO_LIMIT   = '8';
    private const NEAR_LIMIT   = '3';
    private const NODL_LIMIT   = '2,000';
    private const NMR_LIMIT    = '0.5';
    private const NYM_LIMIT    = '25';
    private const OCEAN_LIMIT  = '35';
    private const OMG_LIMIT    = '5';
    private const ORCA_LIMIT   = '10';
    private const OXT_LIMIT    = '75';
    private const OGN_LIMIT    = '50';
    private const OXY_LIMIT    = '600';
    private const PARA_LIMIT   = '350';
    private const PAXG_LIMIT   = '0.003';
    private const PERP_LIMIT   = '12.5';
    private const PHA_LIMIT    = '35';
    private const PLA_LIMIT    = '25';
    private const DOT_LIMIT    = '1';
    private const POLS_LIMIT   = '15';
    private const MATIC_LIMIT  = '6';
    private const POWR_LIMIT   = '30';
    private const PSTAKE_LIMIT = '65';
    private const QTUM_LIMIT   = '2.5';
    private const QNT_LIMIT    = '0.05';
    private const RAD_LIMIT    = '3';
    private const RARI_LIMIT   = '2';
    private const RAY_LIMIT    = '25';
    private const REN_LIMIT    = '60';
    private const RNDR_LIMIT   = '10';
    private const REQ_LIMIT    = '50';
    private const XRP_LIMIT    = '12.5';
    private const XRT_LIMIT    = '2';
    private const RPL_LIMIT    = '0.25';
    private const RBC_LIMIT    = '150';
    private const SBR_LIMIT    = '5,000';
    private const SAMO_LIMIT   = '2,000';
    private const SCRT_LIMIT   = '10';
    private const KEY_LIMIT    = '1,500';
    private const SRM_LIMIT    = '20';
    private const SHIB_LIMIT   = '500,000';
    private const SDN_LIMIT    = '17.5';
    private const SC_LIMIT     = '2,000';
    private const SOL_LIMIT    = '0.35';
    private const SGB_LIMIT    = '400';
    private const SPELL_LIMIT  = '7.500';
    private const STX_LIMIT    = '20';
    private const FIS_LIMIT    = '15';
    private const ATLAS_LIMIT  = '2.000';
    private const POLIS_LIMIT  = '30';
    private const STG_LIMIT    = '12';
    private const XLM_LIMIT    = '60';
    private const STEP_LIMIT   = '500';
    private const GMT_LIMIT    = '12.5';
    private const STORJ_LIMIT  = '15';
    private const SUPER_LIMIT  = '50';
    private const RARE_LIMIT   = '35';
    private const SUSHI_LIMIT  = '5';
    private const SYN_LIMIT    = '8';
    private const SNX_LIMIT    = '3';
    private const TBTC_LIMIT   = '0.0001';
    private const LUNA2_LIMIT  = '3';
    private const LUNA_LIMIT   = '30.000';
    private const UST_LIMIT    = '250';
    private const TVK_LIMIT    = '175';
    private const USDT_LIMIT   = '5';
    private const XTZ_LIMIT    = '5';
    private const GRT_LIMIT    = '80';
    private const SAND_LIMIT   = '8.5';
    private const RUNE_LIMIT   = '5';
    private const T_LIMIT      = '250';
    private const TOKE_LIMIT   = '5';

    private const EUR_LIMIT = '5';
    private const USD_LIMIT = '5';
    private const GBP_LIMIT = '5';
    private const AUD_LIMIT = '10';

    public static function getTradeLimit($currency): ?string
    {
        return static::getTradeLimits()[$currency] ?? null;
    }

    public static function getTradeLimits(): array
    {
        return [
            Crypto::ZRX->name    => self::ZRX_LIMIT,
            Crypto::INCH1->name  => self::INCH1_LIMIT,
            Crypto::AAVE->name   => self::AAVE_LIMIT,
            Crypto::GHST->name   => self::GHST_LIMIT,
            Crypto::ACA->name    => self::ACA_LIMIT,
            Crypto::AGLD->name   => self::AGLD_LIMIT,
            Crypto::AKT->name    => self::AKT_LIMIT,
            Crypto::ALCX->name   => self::ALCX_LIMIT,
            Crypto::ACH->name    => self::ACH_LIMIT,
            Crypto::ALGO->name   => self::ALGO_LIMIT,
            Crypto::TLM->name    => self::TLM_LIMIT,
            Crypto::ALPHA->name  => self::ALPHA_LIMIT,
            Crypto::AIR->name    => self::AIR_LIMIT,
            Crypto::ADX->name    => self::ADX_LIMIT,
            Crypto::FORTH->name  => self::FORTH_LIMIT,
            Crypto::ANKR->name   => self::ANKR_LIMIT,
            Crypto::APE->name    => self::APE_LIMIT,
            Crypto::API3->name   => self::API3_LIMIT,
            Crypto::APT->name    => self::APT_LIMIT,
            Crypto::ANT->name    => self::ANT_LIMIT,
            Crypto::ARPA->name   => self::ARPA_LIMIT,
            Crypto::ASTR->name   => self::ASTR_LIMIT,
            Crypto::AUDIO->name  => self::AUDIO_LIMIT,
            Crypto::REP->name    => self::REP_LIMIT,
            Crypto::REPV2->name  => self::REPV2_LIMIT,
            Crypto::AVAX->name   => self::AVAX_LIMIT,
            Crypto::AXS->name    => self::AXS_LIMIT,
            Crypto::BADGER->name => self::BADGER_LIMIT,
            Crypto::BAL->name    => self::BAL_LIMIT,
            Crypto::BNT->name    => self::BNT_LIMIT,
            Crypto::BAND->name   => self::BAND_LIMIT,
            Crypto::BOND->name   => self::BOND_LIMIT,
            Crypto::BAT->name    => self::BAT_LIMIT,
            Crypto::BSX->name    => self::BSX_LIMIT,
            Crypto::BICO->name   => self::BICO_LIMIT,
            Crypto::BNC->name    => self::BNC_LIMIT,
            Crypto::BTC->name    => self::BTC_LIMIT,
            Crypto::BCH->name    => self::BCH_LIMIT,
            Crypto::BIT->name    => self::BIT_LIMIT,
            Crypto::BTT->name    => self::BTT_LIMIT,
            Crypto::BLZ->name    => self::BLZ_LIMIT,
            Crypto::BOBA->name   => self::BOBA_LIMIT,
            Crypto::FIDA->name   => self::FIDA_LIMIT,
            Crypto::ADA->name    => self::ADA_LIMIT,
            Crypto::CTSI->name   => self::CTSI_LIMIT,
            Crypto::CELR->name   => self::CELR_LIMIT,
            Crypto::CFG->name    => self::CFG_LIMIT,
            Crypto::XCN->name    => self::XCN_LIMIT,
            Crypto::LINK->name   => self::LINK_LIMIT,
            Crypto::CHZ->name    => self::CHZ_LIMIT,
            Crypto::CHR->name    => self::CHR_LIMIT,
            Crypto::CVC->name    => self::CVC_LIMIT,
            Crypto::COMP->name   => self::COMP_LIMIT,
            Crypto::C98->name    => self::C98_LIMIT,
            Crypto::CVX->name    => self::CVX_LIMIT,
            Crypto::ATOM->name   => self::ATOM_LIMIT,
            Crypto::COTI->name   => self::COTI_LIMIT,
            Crypto::CQT->name    => self::CQT_LIMIT,
            Crypto::CSM->name    => self::CSM_LIMIT,
            Crypto::CRV->name    => self::CRV_LIMIT,
            Crypto::DAI->name    => self::DAI_LIMIT,
            Crypto::DASH->name   => self::DASH_LIMIT,
            Crypto::MANA->name   => self::MANA_LIMIT,
            Crypto::DENT->name   => self::DENT_LIMIT,
            Crypto::DOGE->name   => self::DOGE_LIMIT,
            Crypto::DYDX->name   => self::DYDX_LIMIT,
            Crypto::EGLD->name   => self::EGLD_LIMIT,
            Crypto::EWT->name    => self::EWT_LIMIT,
            Crypto::ENJ->name    => self::ENJ_LIMIT,
            Crypto::MLN->name    => self::MLN_LIMIT,
            Crypto::EOS->name    => self::EOS_LIMIT,
            Crypto::ETHW->name   => self::ETHW_LIMIT,
            Crypto::ETH->name    => self::ETH_LIMIT,
            Crypto::ETC->name    => self::ETC_LIMIT,
            Crypto::ENS->name    => self::ENS_LIMIT,
            Crypto::EUL->name    => self::EUL_LIMIT,
            Crypto::FTM->name    => self::FTM_LIMIT,
            Crypto::FET->name    => self::FET_LIMIT,
            Crypto::FIL->name    => self::FIL_LIMIT,
            Crypto::FLR->name    => self::FLR_LIMIT,
            Crypto::FLOW->name   => self::FLOW_LIMIT,
            Crypto::FXS->name    => self::FXS_LIMIT,
            Crypto::GALA->name   => self::GALA_LIMIT,
            Crypto::GAL->name    => self::GAL_LIMIT,
            Crypto::GARI->name   => self::GARI_LIMIT,
            Crypto::MV->name     => self::MV_LIMIT,
            Crypto::GTC->name    => self::GTC_LIMIT,
            Crypto::GNO->name    => self::GNO_LIMIT,
            Crypto::GST->name    => self::GST_LIMIT,
            Crypto::FARM->name   => self::FARM_LIMIT,
            Crypto::HFT->name    => self::HFT_LIMIT,
            Crypto::ICX->name    => self::ICX_LIMIT,
            Crypto::IDEX->name   => self::IDEX_LIMIT,
            Crypto::RLC->name    => self::RLC_LIMIT,
            Crypto::IMX->name    => self::IMX_LIMIT,
            Crypto::INJ->name    => self::INJ_LIMIT,
            Crypto::TEER->name   => self::TEER_LIMIT,
            Crypto::INTR->name   => self::INTR_LIMIT,
            Crypto::ICP->name    => self::ICP_LIMIT,
            Crypto::JASMY->name  => self::JASMY_LIMIT,
            Crypto::JUNO->name   => self::JUNO_LIMIT,
            Crypto::KAR->name    => self::KAR_LIMIT,
            Crypto::KAVA->name   => self::KAVA_LIMIT,
            Crypto::ROOK->name   => self::ROOK_LIMIT,
            Crypto::KEEP->name   => self::KEEP_LIMIT,
            Crypto::KP3R->name   => self::KP3R_LIMIT,
            Crypto::KILT->name   => self::KILT_LIMIT,
            Crypto::KIN->name    => self::KIN_LIMIT,
            Crypto::KINT->name   => self::KINT_LIMIT,
            Crypto::KSM->name    => self::KSM_LIMIT,
            Crypto::KNC->name    => self::KNC_LIMIT,
            Crypto::LDO->name    => self::LDO_LIMIT,
            Crypto::LCX->name    => self::LCX_LIMIT,
            Crypto::LSK->name    => self::LSK_LIMIT,
            Crypto::LTC->name    => self::LTC_LIMIT,
            Crypto::LPT->name    => self::LPT_LIMIT,
            Crypto::LRC->name    => self::LRC_LIMIT,
            Crypto::MKR->name    => self::MKR_LIMIT,
            Crypto::MNGO->name   => self::MNGO_LIMIT,
            Crypto::MSOL->name   => self::MSOL_LIMIT,
            Crypto::POND->name   => self::POND_LIMIT,
            Crypto::MASK->name   => self::MASK_LIMIT,
            Crypto::MC->name     => self::MC_LIMIT,
            Crypto::MINA->name   => self::MINA_LIMIT,
            Crypto::MIR->name    => self::MIR_LIMIT,
            Crypto::XMR->name    => self::XMR_LIMIT,
            Crypto::GLMR->name   => self::GLMR_LIMIT,
            Crypto::MOVR->name   => self::MOVR_LIMIT,
            Crypto::MULTI->name  => self::MULTI_LIMIT,
            Crypto::MXC->name    => self::MXC_LIMIT,
            Crypto::ALICE->name  => self::ALICE_LIMIT,
            Crypto::NANO->name   => self::NANO_LIMIT,
            Crypto::NEAR->name   => self::NEAR_LIMIT,
            Crypto::NODL->name   => self::NODL_LIMIT,
            Crypto::NMR->name    => self::NMR_LIMIT,
            Crypto::NYM->name    => self::NYM_LIMIT,
            Crypto::OCEAN->name  => self::OCEAN_LIMIT,
            Crypto::OMG->name    => self::OMG_LIMIT,
            Crypto::ORCA->name   => self::ORCA_LIMIT,
            Crypto::OXT->name    => self::OXT_LIMIT,
            Crypto::OGN->name    => self::OGN_LIMIT,
            Crypto::OXY->name    => self::OXY_LIMIT,
            Crypto::PARA->name   => self::PARA_LIMIT,
            Crypto::PAXG->name   => self::PAXG_LIMIT,
            Crypto::PERP->name   => self::PERP_LIMIT,
            Crypto::PHA->name    => self::PHA_LIMIT,
            Crypto::PLA->name    => self::PLA_LIMIT,
            Crypto::DOT->name    => self::DOT_LIMIT,
            Crypto::POLS->name   => self::POLS_LIMIT,
            Crypto::MATIC->name  => self::MATIC_LIMIT,
            Crypto::POWR->name   => self::POWR_LIMIT,
            Crypto::PSTAKE->name => self::PSTAKE_LIMIT,
            Crypto::QTUM->name   => self::QTUM_LIMIT,
            Crypto::QNT->name    => self::QNT_LIMIT,
            Crypto::RAD->name    => self::RAD_LIMIT,
            Crypto::RARI->name   => self::RARI_LIMIT,
            Crypto::RAY->name    => self::RAY_LIMIT,
            Crypto::REN->name    => self::REN_LIMIT,
            Crypto::RNDR->name   => self::RNDR_LIMIT,
            Crypto::REQ->name    => self::REQ_LIMIT,
            Crypto::XRP->name    => self::XRP_LIMIT,
            Crypto::XRT->name    => self::XRT_LIMIT,
            Crypto::RPL->name    => self::RPL_LIMIT,
            Crypto::RBC->name    => self::RBC_LIMIT,
            Crypto::SBR->name    => self::SBR_LIMIT,
            Crypto::SAMO->name   => self::SAMO_LIMIT,
            Crypto::SCRT->name   => self::SCRT_LIMIT,
            Crypto::KEY->name    => self::KEY_LIMIT,
            Crypto::SRM->name    => self::SRM_LIMIT,
            Crypto::SHIB->name   => self::SHIB_LIMIT,
            Crypto::SDN->name    => self::SDN_LIMIT,
            Crypto::SC->name     => self::SC_LIMIT,
            Crypto::SOL->name    => self::SOL_LIMIT,
            Crypto::SGB->name    => self::SGB_LIMIT,
            Crypto::SPELL->name  => self::SPELL_LIMIT,
            Crypto::STX->name    => self::STX_LIMIT,
            Crypto::FIS->name    => self::FIS_LIMIT,
            Crypto::ATLAS->name  => self::ATLAS_LIMIT,
            Crypto::POLIS->name  => self::POLIS_LIMIT,
            Crypto::STG->name    => self::STG_LIMIT,
            Crypto::XLM->name    => self::XLM_LIMIT,
            Crypto::STEP->name   => self::STEP_LIMIT,
            Crypto::GMT->name    => self::GMT_LIMIT,
            Crypto::STORJ->name  => self::STORJ_LIMIT,
            Crypto::SUPER->name  => self::SUPER_LIMIT,
            Crypto::RARE->name   => self::RARE_LIMIT,
            Crypto::SUSHI->name  => self::SUSHI_LIMIT,
            Crypto::SYN->name    => self::SYN_LIMIT,
            Crypto::SNX->name    => self::SNX_LIMIT,
            Crypto::TBTC->name   => self::TBTC_LIMIT,
            Crypto::LUNA2->name  => self::LUNA2_LIMIT,
            Crypto::LUNA->name   => self::LUNA_LIMIT,
            Crypto::UST->name    => self::UST_LIMIT,
            Crypto::TVK->name    => self::TVK_LIMIT,
            Crypto::USDT->name   => self::USDT_LIMIT,
            Crypto::XTZ->name    => self::XTZ_LIMIT,
            Crypto::GRT->name    => self::GRT_LIMIT,
            Crypto::SAND->name   => self::SAND_LIMIT,
            Crypto::RUNE->name   => self::RUNE_LIMIT,
            Crypto::T->name      => self::T_LIMIT,
            Crypto::TOKE->name   => self::TOKE_LIMIT,

            Fiat::EUR->name => self::EUR_LIMIT,
            Fiat::USD->name => self::USD_LIMIT,
            Fiat::AUD->name => self::AUD_LIMIT,
            Fiat::GBP->name => self::GBP_LIMIT,
        ];
    }
}




